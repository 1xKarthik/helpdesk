<?php

include 'db.php';

require("class.phpmailer.php");

$userid=$_COOKIE["userid"];
$user=$_COOKIE["user"];
$suggestion=$_POST["content"];
$rating=$_POST["rating"];
date_default_timezone_set('Asia/Kolkata');
$timestamp=date("Y-m-d h:i:s");
$query="insert into suggestions values('','$userid','$suggestion','$rating','$timestamp')";
$stat=mysql_query($query);

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
$mail->SetFrom("noreply.mailer94@gmail.com","Online Help Desk - New Suggestion");
$mail->Subject = "Online Help Desk - New Suggestion";
$message = file_get_contents('suggestion.html');


$message = str_replace("%name%",$user, $message);
$message = str_replace("%time%",$timestamp, $message);
$message = str_replace("%rating%",$rating, $message);
$message = str_replace("%body%",$suggestion, $message);

$mail->MsgHTML($message);
$mailer->AltBody = $message;

$mail->AddAddress("harshareddy@live.com","Harsha Reddy");

if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }

 header("location:index.php?suggestion=success");

?>