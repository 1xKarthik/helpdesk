<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Help Desk - View Problem</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
<style type="text/css">
    div[class="tooltip-inner"] {
    /*width: 120px;
    font-size: 14px;*/
}
</style>
       <link rel="stylesheet" href="button/ladda-themeless.min.css">
    
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                     <a class="brand" href="index.php"> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Help Desk &nbsp;</a>
                    
                        <ul class="nav">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="report.php">Report Problem</a>
                            </li>
                             <li  id="viewtip" data-toggle="tooltip"  data-original-title="Click on a problem in Home Page" data-placement="bottom" data-trigger="hover">
                                <a href="#">View Problem</a>
                            </li>
                            
                        </ul>
                        <!-- Login Check Status Display -->
                    <div class="nav-collapse collapse">
                    <?php
                 if (isset($_COOKIE["user"]))
                     {
                     ?>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_COOKIE["user"]?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <!-- <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li> -->
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                         }
                          else
                        {?>

                        <ul class="nav pull-right">
                            <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="signin">Sign In <strong class="caret"></strong></a>
                        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                            <form method="post" name="loginform" action="checklogin.php" onsubmit="return login_validate()">
                            <div class="control-group" id="uname">
                                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username" data-toggle="tooltip" title="Enter your Username" data-placement="top" data-trigger="manual">
                                </div>
                                <div class="control-group" id="pass">
                                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password" data-toggle="tooltip" title="Enter your Password" data-placement="top" data-trigger="manual">
                                </div>
                                <input style="float: left; margin-right: 10px;" type="checkbox" checked="checked" name="keep" id="remember-me" value="1">
                                <label class="string optional" for="remember_me"> Remember me</label>
                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                                </form>
                            </div>
                        </li>
                        </ul>
                            <?php
                             }
                            ?>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index.php"><i class="icon-chevron-right"></i> Home</a>
                        </li>
                        <li>
                            <a href="report.php"><i class="icon-chevron-right"></i> Report Problem</a>
                        </li>
                        <?php
                        if (isset($_COOKIE["user"]))
                        {
                        ?>
                        <li>
                            <a href="manage.php"><i class="icon-chevron-right"></i>Manage Account</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="active">
                            <a href="about.php"><i class="icon-chevron-right"></i>About Us</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-chevron-right"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="suggestions.php"><i class="icon-chevron-right"></i>Any Suggestions?</a>
                        </li>
                        
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <ul class="breadcrumb">
                                        <i class="icon-chevron-left hide-sidebar" id="toggle" data-toggle="tooltip" title="Hide Sidebar" data-placement="bottom" ><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                                        <i class="icon-chevron-right show-sidebar" style="display:none;" data-trigger="hover"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                                        <li>
                                            <a href="index.php">Home</a> <span class="divider">/</span>    
                                        </li>
                                        <li>
                                            <a href="#">About Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
<div class="span12" id="content">
<div class="row-fluid">

<!-- Status Messages -->

<?php
$flag=0;
                 if (isset($_GET["login"])&&$_GET["login"]=="success")
                     {
                       $flag=1; // to not display login message
                ?>

        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Welcome <?php echo $_COOKIE["user"];?>,</strong> you may now Report your Problem / View Complaints
         </div>
         <?php
           }
         ?>
         <?php
    if (isset($_GET["login"])&&$_GET["login"]=="fail")
     {
    $flag=1; // to not display login message
     ?>

        <div class="alert alert-error text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Access Denied !</strong> Please provide a valid username & password.
         </div>
         
         <?php
           }
         ?>

            <?php
                 if (isset($_GET["logout"])&&$_GET["logout"]=="success")
                     {
                        $flag=1; // to not display login message
                ?>

        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Logout Successful </strong> Login again to Post Problems and View Solutions.
         </div>
         <?php
           }
         ?>
         <?php
                 if (isset($_GET["logout"])&&$_GET["logout"]=="fail")
                     {
                        $flag=1; // to not display login message
                ?>

        <div class="alert alert-error text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Logout Failure </strong> No Active session to Logout.
         </div>
         <?php
           }
         ?>
         <div class="block"  style=" margin: 0 0;">
         <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Anout Help Desk</div>
         </div>
         <div class="block-content collapse in">
           <div class="span12">
           <br/>
          <fieldset>
            <legend>
            Help Desk
            </legend>
            <div style="padding-left:1px;">
            <span style="font-size:15px;line-height: 1.42857;"> Help Desk provides a way to post and view complaints, reply to complaints, send auto-generated mails upon receieving complaints/replies.<br/>
            Commenting on problems is restricted to the owner of the thread and authorities of the System.
            </span>
            </div>
            <br/>
            <legend>
              By:<br>
            </legend>
            For any Queries, contact  - <a href="http://facebook.com/harsha1094" target="blank" style="text-decoration:none;color:black">Karthik Manjunath & SAI</a>
            <br/>
          </fieldset>
         </div>
         </div> 
            
            </div>
            
            
           
            <div align="center">
           <br/><br/><br/><br/><br/><br/><br/><br/>
            <footer>
                <p>&copy; Help Desk 2014</p>
            </footer>
            </div>
             </div>
             </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
       <!-- <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script> -->
        <script src="assets/scripts.js"></script>
         
        <!-- <script src="vendors/ckeditor/adapters/jquery.js"></script>
         <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script> -->
        
<!--<script src="button/spin.min.js"></script>
    <script src="button/ladda.min.js"></script>
<script>
            Ladda.bind( 'button', { timeout: 4000 } );
        </script>-->
        <script type="text/javascript">
        $(document).ready(function () {

    // $('#subjectid').tooltip('hide');
    $('#toggle').tooltip('show');

    $('#viewtip').tooltip();
});
        </script>
    </body>

</html>