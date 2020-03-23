<?php 

if(isset($_POST['register'])){
	$names=$_POST['names'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	
	$username=$_POST['username'];


require 'dbconnect.php';
	$sql1="select * from users where email='$email'";
	$sql2="select * from users where username='$username'";
	$sql3="select * from users where phone='$phone'";
	$res1=mysqli_query($con,$sql1);
	$row1=$res1->fetch_assoc();
	$res2=mysqli_query($con,$sql2);
	$row2=$res2->fetch_assoc();
	$res3=mysqli_query($con,$sql3);
	$row3=$res3->fetch_assoc();


	// if($names=="" || $email=="" || $phone=="" || $username=="" || $password==""){
	// 	echo "<script>location.href='login.php?msg=all';</script>";
	// }
	if($row1['email']==$email){
		$err="<font color='red'> email already exists !!</font>";	
		
	}
	else if($row2['username']==$username){
		$err="<font color='red'>username taken !!</font>";
		
	}
	else if($row3['phone']==$phone){
		$err="<font color='red'>Someone has the same number!!</font>";
		
	}
	else{
$email = filter_var($email, FILTER_SANITIZE_EMAIL);  // Sanitizing E-mail(Remove unexpected symbol like <,>,?,#,!, etc.)
if (filter_var($email, FILTER_VALIDATE_EMAIL))
{

	$sql = "insert into users (names,email,phone,username)values('$names','$email','$phone','$username')";
mysqli_query($con,$sql);

$err="<font color='blue'>Profie updated successfully !!</font>";

}
else{

	$err="<font color='red'>invalid email !!</font>";	
}
}
}





?>




<!DOCTYPE html>
<html>
<head>
	

	  <link rel="icon" href="icon/favicon.png" type="image/x-icon">
	<?php 
	require 'includes.php'; ?>
	<?php require 'scripts.php';?>
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

	<div class="row" style="background:rgba(255, 255, 255,0.2);">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<center>
				<!-- login -->
				<div id="login_interface">
				<div id=""><p class="" id="loginTitle">MyGallery Artist Login</p></div>
				<form class="form loginForm" method="POST" action="pages/authenticate.php" id="login_form" style="margin-bottom: 50px;">
						<center><div id="Login"><img src="icon/User_large.png" class="img"></div></center><br>
						<div style="padding: 10px;">
							<?php if(@$_GET['login']=="noMatch"){ ?>
							<p class="row text-center" style="color: red;font-weight: bold;font-size: 17px">E-mail or Password Incorrect!!</p>
						<?php } ?>
							<label>E-mail</label><input type="text" name="email" class="form-control" required><br>
							<label>Password</label><input type="password" name="password" class="form-control" required><br>
							<center><button type="submit" name="login" class="btn btn-success">Login</button></center><br>
							
						</div>
				</form><br><br>
				<p class="create_account_btn" style="font-weight: bold;color: black;">
				New to <b>MyGallery</b>? Click <button type="button" class="btn btn-primary" id="show_reg">Here</button><br>				
			</p>
			</div>

				<!-- Register -->
				<div id="register_interface" <?php if(!@$_GET['msg']) echo 'style="display: none;"'; ?>>
				<div id=""><p class="" id="loginTitle">MyGallery Register</p></div>
				<p id="msg" class="<?php if(@$_GET['msg']) echo'alert alert-danger'; ?>"><?php 
															if(@$_GET['msg']=="all")
																	echo "All field are required!";
															else if(@$_GET['msg']=="emailExist"){
																	echo "Account with that E-mail exist!!"; ?>
													<script type="text/javascript">
														$(document).ready(function(){
															$("#login_interface").hide();
														});
													</script>
																		<?php } 
															else if(@$_GET['msg']=="usernameExist"){
																	echo "Account with that Username exist!!"; ?>
													<script type="text/javascript">
														$(document).ready(function(){
															$("#login_interface").hide();
														});
													</script>
																		<?php } ?>
																	</p>
				<form class="form registerForm" method="POST" id="register_form">
						<center><div id="Login"><img src="icon/User_large.png" class="img"></div></center><br>
						<div style="padding: 10px;">
						<table class="table table-responsive">
						<Tr>
		<Td colspan="2" id="error"><?php echo @$err;?></Td>
	</Tr>
							<tr>
								<td><label>Names</label><input type="text" name="names" id="names" class="form-control" required></td>
								<td><label>E-mail</label><input type="text" name="email" id="email" class="form-control" required></td>
							</tr>
							<tr>
								<td><label>Phone</label><input type="text" name="phone" id="phone" class="form-control" required></td>
								<td><label>Username</label><input type="text" name="username" id="username" class="form-control" required></td>
							</tr>
							
							<tr><td colspan="2"><center><button type="submit" name="register" class="btn btn-success">Register</button>		</center></td>
							</tr>
						</table>	
							
							
						</div>
				</form><br><br>
			<p class="create_account_btn">
				Already have account? Click <button type="button" class="btn btn-primary" id="show_login">Here</button> to login.<br>				
			</p></div>



				<br><br>
			</center>
			
		</div>
		<div class="col-sm-4"></div>		
	</div>

	

</body>
<?php require '../admin/footer.php';?>
</html>

<script type="text/javascript">
$("#show_login").click(function(){
		$("#register_interface").hide(600);
		$("#login_interface").show(600);
	});

	$("#show_reg").click(function(){
		$("#login_interface").hide(600);
		$("#register_interface").show(600);
	});
	
</script>