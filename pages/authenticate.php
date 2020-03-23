<?php
session_start();
require 'dbconnect.php';



if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from users where email='$email' and password='$password'";
	$res=mysqli_query($con,$sql);
	$num=mysqli_num_rows($res);
	if($num==1){
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		$_SESSION['logged_in']="ok";
		$_SESSION['user']=$email;
     echo "<script>location.href='../user'</script>";
	}
	else{
		echo "<script>location.href='indexx.php?login=noMatch';</script>";
	}
  } 

  ?>
