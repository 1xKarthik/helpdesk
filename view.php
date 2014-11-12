<?php
include 'db.php';
session_start();

?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Online Help Desk - View Problem</title>
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
function comment_validate()
{
	 var text = tinyMCE.get('tinymce_full').getContent(); 

            if (text.length<15)
            {
                document.getElementById("cont").innerHTML="&nbsp;&nbsp;&nbsp; Comment your Solution in a few words <br/><br/>";
                return false;
            }
        else
        {
        document.getElementById("cont").innerHTML="";
         }
}

function voteup()
{
    document.getElementById("includeaction").className="hidden";
    document.getElementById("noactionup").className="btn btn-warning disabled pull-right";
    document.getElementById("noactiondown").className="btn btn-warning disabled pull-right hidden";
}
function votedown()
{
    document.getElementById("includeaction").className="hidden";
    document.getElementById("noactionup").className="btn btn-warning disabled pull-right hidden";
    document.getElementById("noactiondown").className="btn btn-warning disabled pull-right";
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
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="report.php">Report Problem</a>
                            </li>
                            <li class="active">
                                <a href="#">View Complaint</a>
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
                                            <a href="#">View Complaint</a>
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
          <?php
                 if (isset($_GET["comment"])&&$_GET["comment"]=="success")
                     {
                ?>

        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Your Comment has been posted successfully .
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
          You must be<strong> Logged in </strong>to Post your Comment.
          </div>
          <?php
          }
          ?>

<?php
if (!isset($_COOKIE["user"])&&($flag==0))
 {
?>

        <div class="alert alert-error text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span><strong><a id="loginid" onclick="login();return flase;" style="color:maroon;cursor:pointer">Sign in</a></strong> to post Solutions !!!</span>
         </div>
         <?php
           }
         ?>

         <?php
         if (isset($_GET["pid"]))
         {
         $id=$_GET["pid"];
         $_SESSION["pid"]=$id;
         $query="select * from posts where id='$id'";
         $result=mysql_query($query);
          while ($row=mysql_fetch_array($result))
            {
          $userid=$row["userid"];
          $time=$row["time"];
          $subject=$row["subject"];
          $dept=$row["dept"];
          $uname="";
          $content=$row["content"];
          $comments=$row["comments"];
          $result1=mysql_query("select uname,name from userinfo where id='$userid'");
          while ($row1=mysql_fetch_array($result1)) 
            {
                $uname=$row1["uname"];
                $reportedby=$row1["name"];
            }
          	}
         ?>
<?php
if ((isset($_COOKIE["privilege"])&&($_COOKIE["privilege"]!="auth"))&&(isset($_COOKIE["uname"])&&($_COOKIE["uname"]!=$uname)))
{
?>
 <div class="alert alert-error text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          You do not have enough privileges comment on this post. <strong> <a href="logout.php" style="text-decoration:none;color:maroon">Logout</a> </strong> and try logging in using different account.
          </div>
<?php
}
?>

	<!-- End of Status Messages -->
         
         <!-- block -->
          <div class="block"  style=" margin: 0 0;">
         <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Detailed Problem View</div>

         <?php
         if (isset($_COOKIE["user"]))
         {
        $ident=$_COOKIE["userid"];
         $check=mysql_query("select * from ratings where givenby='$ident' and pid='$id'");
         if(mysql_num_rows($check)==0)
         {
         ?>
         <div class="pull-right" style="padding-top:0px;">
         <button class="btn btn-warning" id="voteup" onclick="location='vote.php?stat=up'" data-toggle="tooltip" title="This Report is relevant and self descriptive." data-placement="bottom"><i class="icon-thumbs-up"></i></button>
         <button class="btn btn-danger" id="votedown"  onclick="location='vote.php?stat=down'" data-toggle="tooltip"  title="This Report is irrelevant." data-placement="bottom"    onclick="votedown()"><i class="icon-thumbs-down"></i></button>
         </div>
         <?php
         }
         else
         {
            while ($a=mysql_fetch_array($check)) 
            {
                $vote=$a["vote"];
            }
        if($vote=="1")
        { 
        ?>
         <button id="noactionup"  data-toggle="tooltip" title="You've Voted Up this Report" data-placement="bottom"  class="btn btn-warning disabled pull-right "><i class="icon-thumbs-up"></i></button>
         <?php
        }
        if($vote=="-1")
        {
         ?>
         <button id="noactiondown"  data-toggle="tooltip" title="You've Voted Down this Report" data-placement="bottom"  class="btn btn-warning disabled pull-right "><i class="icon-thumbs-down"></i></button>
        <?php
        }
        }
        }
         ?>
         </div>
         <div class="block-content collapse in">
         <div class="span12">
         <fieldset>
         
         	<legend>
            
                <?php echo $subject;?>
         	</legend>
         	<div class="control-group article_name" align="center"><div class="controls">
             <?php
                $imresult=mysql_query("select pic from userinfo where id='$userid'");
                $path="";
                while ($im=mysql_fetch_array($imresult))
                {
                 $path=$im["pic"];
                }
                $totposts=mysql_query("select count(id) as count from posts where userid='$userid';");
                while ($tot=mysql_fetch_array($totposts)) {
                    $totalp=$tot["count"];
                }
                $totcomments=mysql_query("select count(cid) as countc from comments where uid='$userid';");
                while ($tot=mysql_fetch_array($totcomments)) {
                    $totalc=$tot["countc"];
                }
                $totratings=mysql_query("select count(id) as countr from ratings where givenby='$userid';");
                 while ($tot=mysql_fetch_array($totratings)) {
                    $totalr=$tot["countr"];
                }
                ?>
                <img  id="disppic" rel="popover" data-original-title="<span class='text-center'><?php  echo $reportedby; ?></span>" data-content="Total Posts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<span class='pull-right'> <?php echo $totalp; ?> </span> <br /> Total Comments :<span class='pull-right'> <?php echo $totalc; ?></span> <br /> Problems Rated : <span class='pull-right'><?php echo $totalr; ?></span>" width="60" src="<?php echo $path;?>">&nbsp;
			<div class="input-prepend">
    		<span class="add-on">Reported By</span>
    		<span class="input-large uneditable-input span2"><?php echo $reportedby ?></span>
			</div>		&nbsp;
			<div class="input-prepend">
   			 <span class="add-on">Date Reported</span>
   			 <span class="input-large uneditable-input span2"><?php echo $time ?></span>
			</div>  &nbsp;
			<div class="input-prepend">
    		<span class="add-on">Department</span>
    		<span class="input-large uneditable-input span2"><?php echo $dept ?></span>
			</div>
			</div></div>
             
         </div>
			<div class="span12" style="padding-left:70px;padding-right:70px;">
			<?php echo $content?>
			<br/>
			</div>
			<?php
			$result2=mysql_query("select * from comments where pid='$id'");
			?>
			<!-- <div class="subhead span12">
				<h3 style="float: left;font-size: 20px;line-height: 34px;font-family: Trebuchet MS,Liberation Sans,DejaVu Sans,sans-serif;font-weight: bold;"><?php echo $comments?> Comments</h3>
			</div> -->
            <legend>
                <?php echo $comments?> Comments
            </legend>
			<?php
			if($comments>0)
			{
			while ($row=mysql_fetch_array($result2))
			{
			$uid=$row["uid"];
			$atime=$row["time"];
			$comment=$row["content"];
			$result3=mysql_query("select name from userinfo where id='$uid'");
			while ($nrow=mysql_fetch_array($result3))
			{
			$name=$nrow["name"];
			}
			$result4=mysql_query("select dname from departments where uid='$uid'");
			?>
			<div class="span12">
			<br/>
			<div class="control-group article_name" align="center">
            <div class="controls">
            <?php
                $imresult=mysql_query("select pic from userinfo where id='$uid'");
                $path="";
                while ($im=mysql_fetch_array($imresult))
                {
                 $path=$im["pic"];
                }
                $totposts=mysql_query("select count(id) as count from posts where userid='$uid';");
                while ($tot=mysql_fetch_array($totposts)) {
                    $totalp=$tot["count"];
                }
                $totcomments=mysql_query("select count(cid) as countc from comments where uid='$uid';");
                while ($tot=mysql_fetch_array($totcomments)) {
                    $totalc=$tot["countc"];
                }
                $totratings=mysql_query("select count(id) as countr from ratings where givenby='$uid';");
                 while ($tot=mysql_fetch_array($totratings)) {
                    $totalr=$tot["countr"];
                }
                ?>
                <img class="popcomment" rel="popover" data-original-title="<span class='text-center'><?php  echo $name; ?></span>" data-content="Total Posts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<span class='pull-right'> <?php echo $totalp; ?> </span> <br /> Total Comments :<span class='pull-right'> <?php echo $totalc; ?></span> <br /> Problems Rated : <span class='pull-right'><?php echo $totalr; ?></span>" width="40" src="<?php echo $path;?>">&nbsp;
			<div class="input-prepend">
    		<span class="add-on">Commented By</span>
    		<span class="input-large uneditable-input span2"><?php echo $name ?></span>
			</div> &nbsp;
			<?php
			if (mysql_num_rows($result4)>0)
			{
			while($r=mysql_fetch_array($result4))
			{
			$dname=$r["dname"];
			}
			?>
			<div class="input-prepend">
    		<span class="add-on">Department</span>
    		<span class="input-large uneditable-input span2"><?php echo $dname ?></span>
			</div> &nbsp;
			<?php
			}
			?>
			<div class="input-prepend">
   			 <span class="add-on">Commented On</span>
   			 <span class="input-large uneditable-input span2"><?php echo $atime ?></span>
			</div>
			</div></div>
			</div>
			<div class="span12 pull-right" style="border-bottom:1px solid #CCCCCC;padding-left:70px;padding-right:70px;">
			<?php echo $comment?>
			<br/>
			</div>
			<?php
			}
			}
			?>
         </div>
         <br/>
         </div>
         </fieldset>
         </div>
         <?php
         if ((isset($_COOKIE["privilege"])&&($_COOKIE["privilege"]=="auth"))||(isset($_COOKIE["uname"])&&($_COOKIE["uname"]==$uname)))
         {
         ?>
         <div class="block">
         <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Comment your Solution</div>
         </div>
         <div class="block-content collapse in">
         <div class="span12">
 <form name="comment" method="POST" action="comment.php?pid=<?php echo $id?>" onsubmit="return comment_validate()">
         <fieldset>
		 <textarea id="tinymce_full" name="content"></textarea>
		 <br/>
	 <div class="alert alert-success text-center">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
 		<strong>Tip :</strong> While in edtior, Use Ctrl+Alt+F to toggle between Fullscreen and Normal Modes.
	</div> 
	<div id="cont" align="center" style="color:red;font-size: 15px;"></div>
	<div style="text-align: center; vertical-align: middle;">
		<button class="btn ladda-button btn-normal" data-style="zoom-out" data-spinner-color="#FF0000" type="submit" data-size="l"><span class="ladda-label"><i class="icon icon-comment"></i>&nbsp; Comment</span></button>
	</div>
</fieldset>
</form>
		 </div>
		 </div>
		 </div>
         <?php
         }
     	}
         if (!isset($_GET["pid"]))
         {
         ?>
		<div class="alert alert-error text-center">
            <strong>Forgot Something ? </strong>Missing Problem Id
         </div>
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
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
       <!-- <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script> -->
        <script src="assets/scripts.js"></script>
         <script src="vendors/ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="button/spin.min.js"></script>
    	<script src="button/ladda.min.js"></script>
		<script>
            Ladda.bind( 'button[type=submit]', { timeout: 5000 } );
        </script>
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
    $('#voteup').tooltip();
    $('#votedown').tooltip();
    $('#noactiondown').tooltip();
    $('#noactionup').tooltip();
});
        $(function() {
            $('#disppic').popover({placement: 'right', trigger: 'hover',html:true});
            
             $('.popcomment').popover({placement: 'right', trigger: 'hover',html:true});
            });
        </script>
    </body>

</html>