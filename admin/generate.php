<?php
$id=$_GET['id'];
require '../dbconnect.php';
$names=$_POST['names'];
	$email=$_POST['email'];
    $username=$_POST['username'];
    
    $password=$_POST['password'];


//        $query = "DELETE FROM volunteers WHERE id=$id"; 
//        $result = mysqli_query($connection,$query);


// //redirecting to the previous page
// echo '<script>location.href="volunteers.php"</script>';
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
$password = substr( str_shuffle( $chars ), 0, 8 );
$password1= sha1($password); //Encrypting Password
$result = mysqli_query("SELECT * FROM users WHERE email='$email'");
$data = mysqli_num_rows($con,$result);
if(($data)==0){
// Insert query
// $query = mysqli_query("insert into registration(name, email, password) values ('$name', '$email', '$password1')");
$query="update users set names='$names',username='$username',password='$password'where email='$email'";
if($query){
$to = $email;
$subject = 'Your registration is completed';
/* Let's Prepare The Message For The E-mail */
$message = 'Hello'.$username.'
Your email and password is following:
E-mail: '.$email.'
Your new password : '.$password.'
Now you can login with this email and password.';
/* Send The Message Using mail() Function */
if(mail($to, $subject, $message ))
{
$successMessage = "Password has been sent to your mail, Please check your mail and SignIn.";
}
}
}
?>