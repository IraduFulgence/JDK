<?php
$title = $_POST['title'];
$status = $_POST['status'];
$author = $_POST['author'];
$price = $_POST['price'];
$target_dir ="../images/";
$target_file = $target_dir.basename($_FILES["fileI"]["name"]);
$target_file_n = "images/" . basename($_FILES["fileI"]["name"]);
require '../dbconnect.php';
$sql = "insert into art(title,paintings,author,price,status) values('".$title."', '".$target_file_n."','".$author."','".$price."','".$status."')";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["Post"])) {
    $check = getimagesize($_FILES["fileI"]["tmp_name"]);
    if($check !== false) {
        echo '<script>alert("File is an image - " . $check["mime"] . ".")</script>';
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo '<script>alert("Sorry, file already exists.")</script>';
//     $uploadOk = 0;
// }
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script> alert("Sorry, your file was not uploaded")</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileI"]["tmp_name"], $target_file)) {
        mysqli_query($con,$sql);
        echo '<script> alert(" uploaded successfully")</script>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo '<script> location.href="index.php?web=managepost"</script>';
?>


