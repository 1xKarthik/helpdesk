<?php

include 'db.php';


require("class.phpmailer.php");
$content=$_POST["content"];
$pid=$_GET["id"];
if (!isset($_COOKIE["user"]))
 {
header("location:login-new.php?err=comment");
 }
 else
 {
 	$userid=$_COOKIE["userid"];
	$user=$_COOKIE["user"];
	$timestamp=date("Y-m-d H:i:s");
	$query="insert into comments values('','$pid','$userid','$timestamp','$content')";
	$stat=mysql_query($query);
	$stat=mysql_query("update posts set comments=comments+1 where id='$pid'");

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
$mail->SetFrom("noreply.mailer94@gmail.com","Online Help Desk - Response to Complaint");
$mail->Subject = "Online Help Desk - Response to Complaint Registered";

 }
?>