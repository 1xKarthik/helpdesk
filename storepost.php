<?php
include 'db.php';
require("class.phpmailer.php");

abstract class Subject
{
	abstract function notify($message,$dept);
}

class ConcreteSubject extends Subject
{
	function notify($message,$dept)
	{
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "noreply.mailer94@gmail.com";
		$mail->Password = "29082705";
		$mail->SetFrom("noreply.mailer94@gmail.com","Online Help Desk - New Complaint");
		$mail->Subject = "Online Help Desk - New Complaint";
		$mail->MsgHTML($message);
		$mailer->AltBody = $message;
		
		$query="select uid from departments where dname='$dept'";
		
		$result=mysql_query($query);
		
		while($row=mysql_fetch_array($result))
		{
			$uid=$row["uid"];
			$result1=mysql_query("select * from userinfo where id='$uid'");
			while ($row1=mysql_fetch_array($result1))
			{
			$mail->AddAddress($row1["email"],$row1["name"]);
			}
		}

 if(!$mail->Send())
    {
    header("location:report.php?mail=fail");
    }

	}
}

$subject=$_POST["subject"];
$dept=$_POST["department"];
$privacy=$_POST["privacy"];
$content=$_POST["content"];
$content=mysql_real_escape_string($content);
$subject=mysql_real_escape_string($subject);
$link="http://localhost/project/view.php?pid=";
if (!isset($_COOKIE["user"]))
 {
header("location:report.php?err=login");
 }
else
{

$userid=$_COOKIE["userid"];
$user=$_COOKIE["user"];
date_default_timezone_set('Asia/Kolkata');
$timestamp=date("Y-m-d h:i:s");
$query="insert into posts values('','$userid','$timestamp','$subject','$dept','$privacy','$content','','','')";
$stat=mysql_query($query);
$query1="select id from posts where userid='$userid' and subject='$subject' and dept='$dept' and privacy='$privacy' and content='$content'";
$result=mysql_query($query1);
$id="";
while ($row=mysql_fetch_array($result)) {
$id=$row["id"];
}

$link=$link.$id;
$message = file_get_contents('report.html');
$message = str_replace("%name%",$user, $message);
$message = str_replace("%time%",$timestamp, $message);
$message = str_replace("%subject%",$subject, $message);
$message = str_replace("%body%",$content, $message);
$message = str_replace("%link%",$link, $message);

	$notifyObservers = new ConcreteSubject;
	$notifyObservers->notify($message,$dept);
	header("location:report.php?post=success");
}
?>
