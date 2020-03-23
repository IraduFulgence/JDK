<?php 

 $email = @$_SESSION['email'];
 $password = @$_SESSION['password'];
  require '../dbconnect.php';
  $sql="select * from admin where email='$email' and password='$password'";
  $res=mysqli_query($con,$sql);
  $row=$res->fetch_assoc();
  $user_id=$row['id'];
  
  $num=mysqli_num_rows($res);
          if($num != 1){
            session_destroy();
            
           echo '<script>location.href="login.php"</script>';
          }
?>



<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-5 pb-5 mb-3 d-flex">
        <div class="image">
          <img src="<?= $row['image']?>" class="img-circle elevation-4" alt="User Image" style="height:100px; width:100px;"><br>
          
          <a href="#" class="d-block text-success"><?= $row['names']?></a>
        </div>
        
        
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="index.php?web=manageadmins" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Admins</p>
                </a>
               
              <li class="nav-item">
                <a href="index.php?web=managepost" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?web=manageartist" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Manage Artists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?web=notification" class="nav-link">
                  <i class="far fa-envelope nav-icon"></i>
                  <p>Manage Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?web=managepayment" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?web=updatepassword" class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Update Password</p>
                </a>
                <!-- <li class="nav-item">
                <a href="index.php?web=profile" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li> -->
              </li>
            
          </li>
          <!-- <li class="nav-item">
            <a href="index.php?web=logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  
  