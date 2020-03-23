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
extract($_POST);
if(isset($save))
{
require '../dbconnect.php';
	if($np=="" || $cp=="" || $password=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
$password=md5($password);	

$sql=mysqli_query($con,"select * from admin where password='$password'");
$r=mysqli_num_rows($sql);
if($r==true)
{

	if($np==$cp)
	{
	$np=md5($np);
	$sql=mysqli_query($con,"update admin set password='$np' where email='".$_SESSION['admin']."'");
	
	$err="<font color='blue'>Password updated </font>";
	}
	else
	{
	$err="<font color='red'>New  password not matched with Confirm Password </font>";
	}
}

else
{

$err="<font color='red'>Wrong Old Password </font>";

}
}
}

?>
<h2>Update Password</h2>
<form method="post" class="form">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4"> Old Password <span class="label label-default" id="show_pp"><button id="show_pass" type="button" style="border: none;background:transparent;">
		<i class="fa fa-eye"></i> Show</button></span></div>
		<div class="col-sm-5">
		<input type="password" name="password" class="form-control" value="<?= $row['password'] ?>" id="passwordIn"></div>
	</div>
	
	<div class="row">
	<div class="col-sm-4"> New Password <span class="label label-default" id="show_p"><button id="show_pa" type="button" style="border: none;background:transparent;">
		</div>
		<div class="col-sm-5">
		<input type="password" name="np" class="form-control" id="passwordI"/></div>
	</div>
	
	<div class="row">
	<div class="col-sm-4"> Confirm New Password <span class="label label-default" id="show_pwd"><button id="show_pas" type="button" style="border: none;background:transparent;">
		<i class="fa fa-eye"></i> Show</button></span></div>
		<div class="col-sm-5">
		<input type="password" name="cp" class="form-control" id="passwordInn"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
		<input type="submit" value="Update Password" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	
<?php include 'scripts.php'?>
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
.form-control{
	background:transparent;
}
	</style>

<script type="text/javascript">
	$("#show_pass").click(function(){
		var p=document.getElementById("passwordIn");
		p.type="text";
		$("#show_pp").hide();
	});
	$("#show_pas").click(function(){
		var p=document.getElementById("passwordI");
		p.type="text";
		$("#show_p").hide();
	});
	$("#show_pwd").click(function(){
		var p=document.getElementById("passwordInn");
		p.type="text";
		$("#show_pa").hide();
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