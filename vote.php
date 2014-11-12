<?php
include 'db.php';
session_start();
$stat=$_GET["stat"];
$pid=$_SESSION["pid"];
$by=$_COOKIE["userid"];
$link=$_SERVER['HTTP_REFERER'];
$query="";
if ($stat=="up") {
	$query="insert into ratings values ('','$by','$pid','+1')";
	$query1="update posts set ratings=ratings+1 where id='$pid'";
}
elseif ($stat=="down") {
	$query="insert into ratings values ('','$by','$pid','-1')";
	$query1="update posts set ratings=ratings-1 where id='$pid'";
}
mysql_query($query);
mysql_query($query1);
header("location:$link");
?>