<?php
session_start();
require '../dbconnect.php';
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from admin where email='$email' and password='$password'";
	$res=mysqli_query($con,$sql);
	$num=mysqli_num_rows($res);
	if($num==1){
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		$_SESSION['logged_in']="ok";
		echo "<script>location.href='index.php';</script>";
	}
	else{
		echo "<script>location.href='login.php?login=noMatch';</script>";
	}
  } 
  $_SESSION['admin']=$email;
  ?>
<!-- <?php
	include('../dbconnect.php');
	session_start();
	extract($_POST);
	if(isset($login))
	{
		$que=mysqli_query($conn,"select * from admin where user='$email' and pass='$pass'");
		$row=mysqli_num_rows($que);
		if($row)
			{	
				$_SESSION['admin']=$email;
				header('location:index.php');
			}
		else
			{
				$err="<font color='red'>Wrong Email or Password !</font>";
			}
	}
?> -->