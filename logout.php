<?php

session_start();

if (isset($_SERVER['HTTP_REFERER'])) {
	$link1=$_SERVER['HTTP_REFERER'];
}
else
{
	$link1="index.php";
}

$link=preg_replace('/\\?.*/', '', $link1);

if (isset($_COOKIE["user"])) {
	setcookie("user"," ",time()-3600);
	setcookie("uname"," ",time()-3600);
	setcookie("userid"," ",time()-3600);
	setcookie("privilege"," ",time()-3600);
	$link.="?logout=success";
	if (isset($_SESSION["pid"]))
	{
	$link.="&pid=".$_SESSION["pid"];
	}
	header("location:$link");
}
else
{
	$link.="?logout=fail";
	if (isset($_SESSION["pid"]))
	{
	$link.="&pid=".$_SESSION["pid"];
	}
	header("location:$link");
}
?>