<?php
include 'db.php';
require("class.phpmailer.php");
$id=$_GET["pid"];
$comment=$_POST["content"];
$link="http://localhost/view.php?pid=".$id."&comment=success";
$link1="http://localhost/view.php?pid=".$id;
if (!isset($_COOKIE["user"]))
 {
header("location:view.php?err=login&pid=$id");
 }
else
{	
	$comment=mysql_real_escape_string($comment);
	$userid=$_COOKIE["userid"];
	date_default_timezone_set('Asia/Kolkata');
	$timestamp=date("Y-m-d h:i:s");
	$query="insert into comments values('','$id','$userid','$timestamp','$comment')";
	$a=mysql_query($query)or die(mysql_error());
	$stat=mysql_query("update posts set comments=comments+1 where id='$id'");
	
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
    $mail->SetFrom("noreply.mailer94@gmail.com","Online Help Desk - Reply to Complaint");
    $mail->Subject = "Online Help Desk - Reply to Problem";
    $message = file_get_contents('comment.html');
    $message = str_replace("%name%",$_COOKIE["user"], $message);
	$message = str_replace("%time%",$timestamp, $message);
	$message = str_replace("%comment%",$comment, $message);
	$message = str_replace("%link%",$link1, $message);
	$mail->MsgHTML($message);
	$mailer->AltBody = $message;

	$query="select userid,dept from posts where id='$id'";
	$result=mysql_query($query);
	while ($row=mysql_fetch_array($result))
	{
		$uid=$row["userid"];
		$department=$row["dept"];
	}
	
	if ($uid!=$userid) //If the commented user is the owner of the thread, do NOT send the mail 
	{
	$query="select email,name from userinfo where id='$uid'";
	$result=mysql_query($query);
	while ($row=mysql_fetch_array($result))
	{
		// echo $row["email"];
		// echo $row["name"];
		$mail->AddAddress($row["email"],$row["name"]);
	}
	}

	$query="select uid from departments where dname='$department' AND uid!='$userid'"; //Send mail to all except the commented authority(if)
	$result1=mysql_query($query);
	while ($row1=mysql_fetch_array($result1))
	{
	$uid=$row1["uid"];
	$result2=mysql_query("select * from userinfo where id='$uid'");
	while ($row2=mysql_fetch_array($result2))
	{
		//  echo $row2["email"];
		// echo $row2["name"];
		 $mail->AddAddress($row2["email"],$row2["name"]);
	}
	}
	

	 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }


	header("location:$link");
}
?>