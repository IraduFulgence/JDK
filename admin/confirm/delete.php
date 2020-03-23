<?php
$id=$_GET['id'];
require '../dbconnect.php';



       $query = "DELETE FROM art WHERE id=$id"; 
       $result = mysqli_query($con,$query);


//redirecting to the previous page
echo'<>alert("post deleted from database successfully")</script>';
echo '<script>location.href="../index.php?web=managepost"</script>';

?>