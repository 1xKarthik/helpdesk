<!DOCTYPE html>
<?php
include 'db.php';
?>
<html class="no-js">
    
    <head>
        <title>Online Help Desk - Suggestions</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
        <link rel="stylesheet" href="button/ladda-themeless.min.css">
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
function validate()
{
 if(document.suggestion.rating.value=="na")
             {
            document.getElementById("rating-group").className="control-group offset3 error";
            return false;
            }
            else
            {
            document.getElementById("rating-group").className="control-group offset3";
            }
 var text = tinyMCE.get('tinymce_full').getContent(); 

            if (text.length<15)
            {
                document.getElementById("cont").innerHTML="&nbsp;&nbsp;&nbsp; Comment your suggestion  <br/><br/>";
                return false;
            }
        else
        {
        document.getElementById("cont").innerHTML="";
         }

            return true;
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
                        <li>
                            <a href="manage.php"><i class="icon-chevron-right"></i>Manage Account</a>
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
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Any Suggestions?</a>
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
                                            <a href="index.php">Home</a><span class="divider">/</span>    
                                        </li>
                                        <li>
                                            <a href="#">Suggestions</a>
                                        </li>
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
if (!isset($_COOKIE["user"]))
 {
?>

        <div class="alert alert-error text-center">
          <span><strong><a id="loginid" onclick="login();return flase;" style="color:maroon;cursor:pointer">Sign in</a></strong> give sugeestions !!!</span>
         </div>
         <?php
           }
         ?>



         <!-- End of Status Messages -->

          
            <?php
             if (isset($_COOKIE["user"]))
            {
            ?>
            <div class="block">
         <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Suggestions</div>
         </div>
          <div class="block-content collapse in">
         <div class="span12">
         <fieldset>
         <legend>
             Be specific on your suggestions.
         </legend>
         <form class="form-horizontal" name="suggestion" method="POST" action="suggest.php" onsubmit="return validate()">
            <div class="control-group offset3" id="rating-group">
                <label class="control-label" for="rating">Rate our Website :</label>
                <div class="controls">
                <div class="input-prepend">
             <span class="add-on">Rating</span>
             <select id="rating" name="rating" style="width:80px;">
             <option value="na" selected="">Select</option>
             <option value="0">0</option>
             <option value="2">2</option>
              <option value="6">6</option>
              <option value="8">8</option>
              <option value="10">10</option>
             </select>
                </div>
                </div>
                </div>
        <div class="block-content collapse in">
        <textarea id="tinymce_full" name="content"></textarea>
        </div>
<div class="alert alert-success text-center">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong>Tip :</strong> While in edtior, Use Ctrl+Alt+F to toggle between Fullscreen and Normal Modes.
</div>
<div id="cont" align="center" style="color:red;font-size: 15px;"></div>

<div style="text-align: center; vertical-align: middle;">
<button class="btn ladda-button btn-normal" data-style="zoom-out" data-spinner-color="#FF0000" type="submit" data-size="l"><span class="ladda-label"><i class="icon icon-envelope"></i>&nbsp; Suggest</span></button>
</div>
            </form>
         </fieldset>
         </div>
         </div>
         </div> <!-- block -->  
         <?php
        }
         ?>
         



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
        <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        tinymce.init({
            selector: "#tinymce_full",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });
        </script>
        <script src="button/spin.min.js"></script>
    <script src="button/ladda.min.js"></script>
    <script>
            Ladda.bind( 'button', { timeout: 4000 } );
        </script>
        <script type="text/javascript">
        $(document).ready(function () {

    // $('#subjectid').tooltip('hide');
    $('#toggle').tooltip('show');
    $('#viewtip').tooltip();
});
        </script>
    </body>

</html>