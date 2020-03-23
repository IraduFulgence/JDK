<?php  
require '../dbconnect.php';
if(isset($_POST['uploadNewPic'])){
	$id=@$_GET['id'];
	$s_path=$_FILES['newPic']['tmp_name'];
	$t_path="profiles/".$_FILES['newPic']['name'];
		if(move_uploaded_file($s_path, $t_path)){
			$sql1="update admin set image='$t_path' where id='$id'";
			mysqli_query($con,$sql1);
			echo '<script>location.href="index.php?web=updateprofile";</script>';
		}
	}


 ?>