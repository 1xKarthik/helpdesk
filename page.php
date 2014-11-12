<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
    
    <head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
    </head>
<body>

<?php
if (isset($_GET["page"])) {
$page=$_GET["page"];
}
else
{
	$page=1;
}
$query="select * from posts where privacy='0' order by time desc";
$result=mysql_query($query);
$total=mysql_num_rows($result);
$range=ceil($total/4);
echo($range);
$limit1=$range;
$limit2=$range+$limit1;
$limit3=$range+$limit2;
$limit4=$range+$limit3;
?>
<div class="span12">
<form  name="paging" method="GET" action="?">
 <select id="pages" name="pages">
        <option value=<?php echo $limit1; if(isset($_GET["pages"])&&($_GET["pages"]=="5"))echo "selected=\"selected\"";?>><?php echo $limit1;?></option>
        <option value=<?php echo $limit2; if(isset($_GET["pages"])&&($_GET["pages"]=="10"))echo "selected=\"selected\"";?>><?php echo $limit2;?></option>
        <option value=<?php echo $limit3; if(isset($_GET["pages"])&&($_GET["pages"]=="15"))echo "selected=\"selected\"";?>><?php echo $limit3;?></option>
        <option value=<?php echo $limit4; if(isset($_GET["pages"])&&($_GET["pages"]=="15"))echo "selected=\"selected\"";?>><?php echo $limit4;?></option>
 </select>
<button class="btn" type="submit">Fetch</button>
</form>
 <br/>

 <?php
 if (isset($_GET["pages"])) {

 	$pages=$_GET["pages"];
 }
 else
 {
 $pages=$limit1;
 }
 $showing=0;
while (($showing < $pages)&&($row=mysql_fetch_array($result)))
{
	$id=$row["id"];
	$userid=$row["userid"];
	$time=$row["time"];
	$subject=$row["subject"];
$showing++;
echo "$id $userid $time $subject <br/>";
}
?>
</div>


	<script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/scripts.js"></script>
</body>
  </html>