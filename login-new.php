<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Project</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet/less" type="text/css" href="themes/less/bootstrap.less">
		<script src="themes/js/less/less.js" type="text/javascript"></script>

		<link rel="stylesheet" href="themes/style/delta.main.css" />
		<link rel="stylesheet" href="themes/style/delta.grey.css"/>

		<link rel="stylesheet" type="text/css" href="bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="prettify.css"></link>
<link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5.css"></link>
		
		<style type="text/css">
	
	.b1 {
    width: 15px;
    height: 23px;
}
.b2 {
    height: 23px;
}

.center {
     float: none;
     margin-left: auto;
     margin-right: auto;
}

.form-horizontal .control-label {
     padding-top: 15px;
 }
</style>


</head>

	<body>
	<br>
	<div id="sidebar">
		<h1 id="logo"><a href="index.php">Online Help Desk</a></h1>
		<a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
		<ul>
			<li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Home</span></a></li>

			<li><a href="#"><i class="icon icon-warning-sign"></i> <span>Report Problem</span></a></li>
			<li><a href="#"><i class="icon icon-user"></i> <span>Manage Account</span></a></li>
			<li class="submenu">
				<a href="#"><i class="icon icon-group"></i> <span>About Us</span> <span class="label">2</span></a>
				<ul>
					<li><a href="#">About OHD</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="icon icon-phone"></i> <span>Contact Us</span></a>
			</li>
			<li><a href="#"><i class="icon icon-thumbs-up"></i> <span>Like Us</span></a></li>
			<li><a href="#"><i class="icon icon-bullhorn"></i> <span>Any Suggestions?</span></a></li>
		</ul>
	</div>
	  <div id="mainBody" style="border-top-left-radius: 0px">
			<h1>Sign In
				<div class="pull-right">
				

				<?php
           		 if (isset($_COOKIE["user"])) 
           			 {
            	?>

				<a class="btn tip-bottom b1" title="Manage Users"><i class="icon-user"></i></a>
				<a class="btn  tip-bottom b1" title="Manage Comments" style="position:relative"><i class="icon-comment"></i>
				<span style="position:absolute; border-radius:12px; top:-23%; height:12px; width:12px" class="label label-important">5</span></a>
				
				<a class="btn b2" title="" href="#"><i class="icon icon-user"></i> <span>Profile</span></a>
				<a class="btn b2" title="" href="#"><i class="icon icon-cog"></i> Settings</a>
				<a class="btn btn-danger" title="" href="#"><i class="icon-off"></i></a>
				<?php
            		}
           		 else
            	{?>


            	<a class="btn btn-success b2" title="" href="login-new.php"><i class="icon icon-user"></i> <span>&nbsp;Login</span></a>

            	<?php
           			 }
            	?>
				</div>
			</h1>
		<div id="breadcrumb">
			<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
			<a href="#" class="current">Login</a>
		</div>
		




<!-- Status Messages -->

 <?php
if (isset($_GET["err"])&&$_GET["err"]=="comment")
{
?>

		<div class="alert alert-error text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Login</strong> to post your comments.
         </div>
         <?php
           }
         ?>

			<div class="row-fluid">
                    <div class="span6 offset3">
                        <div class="area">
                        
                            <form class="well form-horizontal" method="POST" action="checklogin.php">
                            </br>
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputUsername" name="username" placeholder="Enter your Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputPassword" name="password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" checked="checked" name="keep" value="1"> Keep me signed in  
                                            <!-- <a href="#" class="btn btn-link">Forgot my password</a> -->
                                        </label></br>
                                        <button type="submit" class="btn btn-success">Sign In</button>
                                    </div>
                                </div>  
                                <?php
                                if(isset($_GET["err"])&&$_GET["err"]=="login")
                                {
                                	?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Access Denied!</strong> Please provide valid username & password.
                                </div>
                                <?php
                                }
                                else
                                	echo "</br>";
                                ?>
                            </form> 
                        </div>

		</div>
		</div>
<br/><br/><br/>		
		</div>

            <script src="themes/js/jquery.min.js"></script>
            <script src="themes/js/delta.js"></script>
            <script src="themes/js/delta.dashboard.js"></script>



<script src="prettify.js"></script>
<script src="bootstrap.min.js"></script>
<script src="bootstrap-wysihtml5.js"></script>

<script type="text/javascript" charset="utf-8">
	$(prettyPrint);
</script>

	</body>
</html>