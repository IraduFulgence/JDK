<?php 

require '../dbconnect.php';
$email=@$_SESSION['email'];
$password=@$_SESSION['password'];
//$sql="select * from admin where email='$email' and password='$password'";
$res=mysqli_query($con,$sql);
$row=$res->fetch_assoc();
$id=$row['id'];
$sql=mysqli_query($con,"select * from admin where email='".$_SESSION['admin']."'");

$num=mysqli_num_rows($res);
if($num != 1){
	session_destroy();
	echo "<script>location.href='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Art Gallery</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

      <link rel="icon" href="icon/favicon.png" type="image/x-icon">
      <style>
          .form{
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
<?php 
      require '../dbconnect.php';
      $sql="select * from users";

      $result = mysqli_query($con,$sql);
        $i=1;
       while($row = $result -> fetch_assoc()){
          if($i==1)
            echo '<table class="table-responsive">';
      ?>

	<tr>
	<a class="btn btn-success btn-lg" href="#" onclick="confirmdelete()"><?php echo $row['username'] ?></a>
	</tr>
	<?php 
  $i++;
  if($i==2){
      echo '</table>';
      $i=1;
 } } ?>


<table class="table table-hover table-striped">
           
            
		   <thead>
			 <tr>
			   <th scope="col">ID</th>
			   <th scope="col">Names</th>
			   <th scope="col">Email</th>
			   <th scope="col">Username</th>
			   <th scope="col">image</th>
			   <th scope="col">Password</th>
			   
			 </tr>
		   </thead>
		   <tbody>
				<?php 
			 require '../dbconnect.php';
			   $sql="select * from users";
		 
			   $result = mysqli_query($con,$sql);
				 $i=1;
				while($row = $result -> fetch_assoc()){
				   if($i==1)
					 
			   ?>
			 <tr>
			   <td><?php echo $row['id'] ?></td>
			   <td><?php echo $row['names'] ?></td>
			   <td><?php echo $row['email'] ?></td>
			   <td><?php echo $row['username'] ?></td>
			   <td><?php echo $row['password'] ?></td>
			   <td><?php echo $row['image'] ?></td>
			  
			   <!--- delete button using link --->
			   <!-- <td><a class="btn btn-danger" href="#" onclick="confirmdelete(<?= $row['id'] ?>)">Generate Password</a></td> -->
			   <td><input type="submit" class="btn  btn-success" value="Generate Password" name="update"  onclick="confirmdelete(<?= $row['id'] ?>)"/></td>
			   <td><a class="btn btn-info" href="#" onclick="confirmde(<?= $row['id'] ?>)">Delete</a></td>
			   <td><a class="btn btn-success" href="#" onclick="confirm(<?= $row['id'] ?>)">See Posts</a></td>
			 </tr>
			 <?php 
		   
		  
		  }  ?>
		   </tbody>
		 </table>
			 
		   </div>
		 </div>
</body>
</html>
<script>
    function confirmdelete(id) {
        var r = confirm("Give this Artist password?");
        if (r == true) {
		  <?php 
			if(isset($_POST['update'])){
				$id=$_GET['id'];
				$names=$_POST['names'];
				$email=$_POST['email'];
				$username=$_POST['username'];
				
				$password=$_POST['password'];
				require '../dbconnect.php';
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
$password = substr( str_shuffle( $chars ), 0, 8 );
$password1= sha1($password); //Encrypting Password
$result = mysqli_query("SELECT * FROM users WHERE email='$email'");
$data = mysqli_num_rows($con,$result);
if(($data)==0){
// Insert query
// $query = mysqli_query("insert into registration(name, email, password) values ('$name', '$email', '$password1')");
$query="update users set names='$names',username='$username',password='$password'where id=$id ";
if($query){
$to = $email;
$subject = 'Your registration is completed';
/* Let's Prepare The Message For The E-mail */
$message = 'Hello'.$username.'
Your email and password is following:
E-mail: '.$email.'
Your new password : '.$password.'
Now you can login with this email and password.';
/* Send The Message Using mail() Function */
if(mail($to, $subject, $message ))
{
$successMessage = "Password has been sent to your mail, Please check your mail and SignIn.";
}
}
}
			}
			
			?>
        }
    }
</script>
