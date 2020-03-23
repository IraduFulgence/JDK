<?php session_start();
$admin= $_SESSION['admin'];
 $email = @$_SESSION['email'];
 $password = @$_SESSION['password'];
  require '../dbconnect.php';
  $sql="select * from admin where email='$email' and password='$password'";
  
		  $res = mysqli_query($con,$sql);
		  $users=$res->fetch_assoc();
           $row = mysqli_num_rows($res);
          if($row != 1){
            session_destroy();
            
           echo '<script>location.href="login.php"</script>';
          }
?>




<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
<link href="images/icon.png" rel="icon">
<style>
          body{
	font-family: myFont;
	background-image: url(icon/Photographer4K.jpg);
	background-size: 100%;
	font-weight: bold;
	color: black;
	background-size: 100%;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
      </style>
</head>

<body>
<div class="container-fluid">
			<div class="row header">
				<div class="col-md-9"><h3>Art Gallery</h3></div>
				<div class="col-md-3">
					<ul class="user-nav">
						<li class="dropdown  fa fa-user user-icon">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span>Hi <?php echo $users['username']; ?> </span> <span class="fa fa-user"></span>  <span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
							<li class="nav-item">
                <a href="index.php?web=profile" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  Update Profile
                </a>
              </li>
								
								<li class="divider"></li>
								<li class="logout-li"><a href="index.php?web=logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              Logout</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
<div class="wrapper">

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
   

    <!-- Sidebar -->
    
<!-- side bar menu -->
<?php require 'home.php'?>
</aside>
<!-- body -->
<div class="content-wrapper">
<div class="row">
  <div class="col-lg-8 offset-1">
  <?php 
				if(@$_GET['web']=="manageadmins"){
					include 'manageadmin.php';

				}
				else if(@$_GET['web']=="updatepassword"){
					include 'update_password.php';
				}
				else if(@$_GET['web']=="managepost"){
					include 'manageposts.php';
				}
				else if(@$_GET['web']=="manageartist"){
					include 'manageartist.php';
				}
				else if(@$_GET['web']=="profile"){
					include 'profile.php';
				}
				// else if(@$_GET['web']=="updateprofile"){
				// 	include 'profile.php';
				// }
				else if(@$_GET['web']=="logout"){
					include 'logout.php';
				}
			//  to be changed soon
				else if(!@$_GET['web']){
					include 'update_password.php';
				}
				   
		   ?>
			
			
		
  </div>
</div>
</div>
<!-- REQUIRED SCRIPTS -->
<?php include 'scripts.php'?>
<!-- jQuery -->

</body>
<?php include 'footer.php'?>
</html>
