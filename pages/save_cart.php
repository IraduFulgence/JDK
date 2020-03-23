<?php
	session_start();
	if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){
			$_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
		}

		$_SESSION['message'] = 'Cart updated successfully';
		//if the cart successfully updated return to cart home page 
		echo "<script>location.href='../user/index.php'</script>";
	}
?>
