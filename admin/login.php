<!DOCTYPE html>
<html>
<head>
	<title>Online Art Gallery</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 <link href="images/icon.png" rel="icon">
	<?php require 'includes.php'; ?>
</head>
<body>

	<div class="row" style="background:rgba(255, 255, 255,0.2);">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<center>
				<!-- login -->
				<div id="login_interface">
				<div id=""><p class="" id="loginTitle">Admin Login</p></div>
				<form class="form loginForm" method="POST" action="authenticate.php" id="login_form" style="margin-bottom: 50px;">
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
			
			</div>
      
				
	<div class="row" style="position: fixed;bottom: 0;width:100%;">
		<div class="col-sm-12 text-warning">
			<?php require 'footer.php'?>
		</div>
        
	</div>

</body>
</html>

<script type="text/javascript">
	$("#show_reg").click(function(){
		$("#login_interface").hide(600);
		$("#register_interface").show(600);
	});
	$("#show_login").click(function(){
		$("#register_interface").hide(600);
		$("#login_interface").show(600);
	});

</script>