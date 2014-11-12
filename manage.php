<!DOCTYPE html>
<?php
include 'db.php';
?>
<html class="no-js">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8;" />
    <head>
        <title>Online Help Desk - Manage Account</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>


       <!-- <link rel="stylesheet" href="button/ladda-themeless.min.css"> -->
    
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script type="text/javascript">
function login_validate()
{
    if (document.loginform.username.value.length<3) 
            {
                document.getElementById("uname").className="control-group error";
                $('#username').tooltip('show');
                return false;
            }
            else
            {
                 document.getElementById("uname").className="control-group";
                 $('#username').tooltip('hide');
            }
    if (document.loginform.password.value.length<3) 
            {
                document.getElementById("pass").className="control-group error";
                $('#password').tooltip('show');
                return false;
            }
            else
            {
                 document.getElementById("pass").className="control-group";
                 $('#password').tooltip('hide');
            }
            
}
function login()
            {
               $("#signin.dropdown-toggle").click();
               return false;
            }
function file_validate()
{
     var file =  document.getElementById('pic').value;
     // var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
     // var extension = ext.toLowerCase();
     var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
     if(!re.exec(file))
    {
    document.getElementById('fileerr').className="alert alert-error text-center";
    return false;
    }
    else
    {
    document.getElementById('fileerr').className="alert alert-error text-center hidden";
    return true;
    }
}            
        </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                      <a class="brand" href="index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Online Help Desk&nbsp;&nbsp;&nbsp;</a>
                    
                        <ul class="nav">
                            <li class="active">
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
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Manage Account</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="about.php"><i class="icon-chevron-right"></i>About Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i>Contact Us</a>
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
                                            <a href="#">Manage Account</a>
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
            <strong>Welcome <?php echo $_COOKIE["user"];?>,</strong> you may now Report your complaint
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

<?php
         if(isset($_GET["err"])&&$_GET["err"]=="login")
          {
            $flag=1;
          ?>
          <div class="alert alert-error text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          You must be<strong> Logged in </strong>to Report your Problem.
          </div>
          <?php
          }
          ?>


<?php
         if(isset($_GET["suggestion"])&&$_GET["suggestion"]=="success")
          {
          ?>
          <div class="alert alert-success text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Your Suggestion has been recorded Succesfully.
          </div>
          <?php
          }
          ?>

<?php
         if(isset($_GET["update"])&&$_GET["update"]=="success")
          {
          ?>
          <div class="alert alert-success text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Your Profile Has Been Updated Successfully.
          </div>
          <?php
          }
?>

<?php
         if(isset($_GET["update"])&&$_GET["update"]=="error")
          {
          ?>
          <div class="alert alert-error text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          There Has Been an error Updating Your Profile. Please try again.
          </div>
          <?php
          }
?>

<div id="fileerr" class="alert alert-error text-center hidden">
Please Upload jpeg / jpg / bmp / png Images.
</div>

<?php
if (!isset($_COOKIE["user"])&&($flag==0))
 {
?>

        <div class="alert alert-error text-center">
          <span><strong><a id="loginid" onclick="login();return flase;" style="color:maroon;cursor:pointer">Sign in</a></strong> to report your problem !!!</span>
         </div>
         <?php
           }
         ?>



         <!-- End of Status Messages -->
         
        <div class="block" style=" margin: 0 0;">
         <div class="navbar navbar-inner block-header">
         <div class="text-center" style="color:#F89406"><?php echo $_COOKIE["user"];?>'s Account</div>
         </div>
          <div class="block-content collapse in">
           <div class="span12 text-center">
           <table border="0" align="center">
          <tr> <td>Name : </td> <td><span class="input-large uneditable-input span2"><?php echo $_COOKIE['user'];?></span></td></tr>
           <tr> <td> Username :</td> <td> <span class="input-large uneditable-input span2"><?php echo $_COOKIE['uname'];?></span> </td> </tr>
            <tr> <td> Privilege : </td> <td> <span class="input-large uneditable-input span2"><?php echo $_COOKIE['privilege'];?></span> </td> </tr>
           <form name="update" enctype="multipart/form-data" action="update.php" onsubmit="return file_validate()" method="POST">
           <tr>  <td>Display Picture :</td> <td> <input name="pic" type="file" id="pic" style="height:30px;"></input></td></tr>
           <tr><td colspan="2">&nbsp;</td></tr>
           <tr><td colspan="2"><button class="btn" type="submit"><i class="icon-refresh"></i> Update</button></td></tr>
           <tr><td colspan="2">
           
            </td></tr>
            </form>
            </table>
            </div>
           </div>
           </div>
         </div>
         <hr>
            
            <div align="center">
            <footer>
                <p>&copy; Online Help Desk 2014</p>
            </footer>
            </div>
        </div>

        </div>
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