<?php
include 'db.php';
$file = $_FILES['pic']['name'];
if($file != "none")
{
$ext = end(explode(".", $file));
$file_name = $_COOKIE["userid"];
$link=$_SERVER['HTTP_REFERER'];
$link=preg_replace('/\\?.*/', '', $link);
$path= "pics/".$file_name.".".$ext;
$res=mysql_query("select pic from userinfo where id='$file_name'");
while ($row=mysql_fetch_array($res))
{
	$oldpic=$row["pic"];
}
if(($oldpic!="pics/male.jpg")||($oldpic!="pics/female.jpg"))
{
	unlink($oldpic);
}
if(copy($_FILES['pic']['tmp_name'], $path))
{
mysql_query("update userinfo set pic='$path' where id='$file_name'");
header("location:$link?update=success");
}
else
{
header("location:$link?update=error");
}
}
?>