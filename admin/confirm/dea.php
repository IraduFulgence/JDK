<?php
$id=$_GET['id'];
require '../dbconnect.php';



       $query = "UPDATE art SET status = 'hide' WHERE id=$id"; 
       $result = mysqli_query($con,$query);


//redirecting to the previous page
echo'<>alert("painting shown successfully")</script>';
echo '<script>location.href="../index.php?web=managepost"</script>';

?>