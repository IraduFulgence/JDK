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
if(isset($_POST['update'])){
	$names=$_POST['names'];
	$email=$_POST['email'];
    $username=$_POST['username'];
    
    $password=$_POST['password'];
	require '../dbconnect.php';
	//$query="update admin set names='$names',username='$username',password='$password'where email='".$_SESSION['admin']."'";
	$sql = "insert into admin (names,email,password,username)values('$names','$email','$password','$username')";
mysqli_query($con,$sql);

$err="<font color='blue'>Profie updated successfully !!</font>";
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add new Admin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<center>
				<form method="post" style=" margin-top: 30px;
											width: 116px;
											height: 116px;
											border: 2px solid black;
											border-radius: 50%;
											position: relative;">				
					<img src="<?= $row['image'] ?>" style="width: 116px;height: 116px;border-radius: 50%;">
					<div style="
					                   position: absolute;
					                   bottom: 0;					                   
					                   width: 100%;
					                   height: 26px;
					                   border-radius: 13px;
					                   background-color: rgba(0,0,0,1);">
						<a href="#" style="text-decoration: none;color: white;" data-toggle="modal" data-target="#myProfileChanger">Change</a>
					</div>				
				</form>
			</center>
			
			<form class="form" method="post">

<div style="position:absolute;
			background:rgba(0,0,0,0.6);
			width: 600px;
			height: 360px;
			border-radius: 20px;
			display: none;" id="loader1_hd"></div>

<div id="loader1" style="
				width: 100px;
				height: 100px;
				border-radius: 50%;
				border-right: 17px solid #6b6b47;
				border-left: 17px solid #d1e0e0;
				border-bottom:17px solid #d1e0e0;
				border-top: 17px solid #d1e0e0;
				animation-name: myAnim;
				animation-duration: 1.5s;
				animation-iteration-count: infinite;
				position: absolute;
				margin-top: 100px;
				left: 40%;
				display: none;
				"></div>


<table class="table table-responsive">
<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
	<tr>
		<td>Names</td>
		<td><input type="text" name="names" class="form-control"></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td><input type="text" name="email" class="form-control" ></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" class="form-control"></td>
	</tr>
	
	<tr>
		<td>Password <span class="label label-default" id="show_pp"><button id="show_pass" type="button" style="border: none;background:transparent;">
		<i class="fa fa-eye"></i> Show</button></span></td>
		<td><input type="password" name="password" class="form-control"  id="passwordIn"></td>
	</tr>
	<tr>
		<td colspan="2">
			<center>
			<!-- <span class="fa fa-save"></span>  -->
			<input type="submit" class="btn  btn-success" value="Add" name="update"/>
					
				
			</center>
		</td>
	</tr>
</table>
</form>
			</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
					
      </div>
    </div>
  </div>
</div>
<?php 
      require '../dbconnect.php';
      $sql="select * from admin";

      $result = mysqli_query($con,$sql);
        $i=1;
       while($row = $result -> fetch_assoc()){
          if($i==1)
            echo '<div class="card-group">';
      ?>
    <div class="card">
      
      <img src="<?php echo $row['image'] ?>" class="img-circle elevation-4" alt="..." style="width: 200px; height: 200px;">
      <div class="card-body">
      <p class="card-text" style="font-size: 30px; "><?php echo $row['names'] ?></p>
        <p class="card-text"><?php echo  $row['email'] ?></p>
        <p class="card-text"><?php echo  $row['username'] ?></p>
       <input type="password" name="password" class="form-control" value="<?= $row['password'] ?>" id="passwordIn" readonly></td>
      </div>
  </div>
 
 <?php 
  $i++;
  if($i==3){
      echo '</div>';
      $i=1;
 } } ?>


</body>
</html>
<script type="text/javascript">
	$("#show_pass").click(function(){
		var p=document.getElementById("passwordIn");
		p.type="text";
		$("#show_pp").hide();
	});


	$(document).ready(function(){
		$('#profile_form').on('submit',function(e){
			e.preventDefault();
			 $(this).ajaxSubmit({
			 	uploadProgress:function(event,position,total,percentageComplete){
            		$("#loader1_hd").show();
            		$("#loader1").show();
            	},
            	success:function(){
            		$("#loader1_hd").hide();
            		$("#loader1").hide();
            		$("#msgInfo").show();
            	},
            	target: '#output'
			 });
			 resetForm: true;
		});
	});


	$("#close_msgInfo").click(function(){
		$("#msgInfo").hide(600);
	});
</script>

<!-- Modal -->
<div class="modal fade" id="myProfileChanger" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select new profile picture</h4>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="operations.php?id=<?= $id ?>" class="form">
          	<input type="file" name="newPic" class="form-control"><br>
          	<button type="submit" name="uploadNewPic" class="btn btn-success"><span class="fa fa-upload"></span> Upload</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>