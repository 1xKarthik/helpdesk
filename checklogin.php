<?php

session_start();

include 'db.php';
$link="";

if (isset($_SERVER['HTTP_REFERER'])) {
	$link1=$_SERVER['HTTP_REFERER'];
}
else
{
	$link1="index.php";
}

$link=preg_replace('/\\?.*/', '', $link1);

$username=$_POST['username'];
$password=$_POST['password'];


$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM userinfo WHERE uname='$username' and pass='$password'";

$result=mysql_query($sql);

$count=mysql_num_rows($result);



if($count==1)
{
	$link.="?login=success";
	if (isset($_SESSION["pid"]))
	{
	$link.="&pid=".$_SESSION["pid"];
	}

	while ($a=mysql_fetch_array($result)) {
		$userid=$a["id"];
		$privilege=$a["privilege"];
		$user=$a["name"];
		}
	if($_POST["keep"]==1)
	{
setcookie("user",$user,time()+3600*24*7);
setcookie("uname",$username,time()+3600*24*7);
setcookie("userid",$userid,time()+3600*24*7);
setcookie("privilege",$privilege,time()+3600*24*7);
	}
	else
	{
		setcookie("user",$user,time()+3600);
		setcookie("uname",$username,time()+3600);
		setcookie("userid",$userid,time()+3600);
		setcookie("privilege",$privilege,time()+3600);
	}
	header("location:$link");
}
elseif ($count!=1) {
	$link.="?login=fail";
	if (isset($_SESSION["pid"]))
	{
	$link.="&pid=".$_SESSION["pid"];
	}
header("location:$link");
}

?>
