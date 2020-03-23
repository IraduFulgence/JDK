<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jquery.min.js"></script>
      <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="admin/images/icon.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<?php require 'scripts.php'; ?>
  </head>
  <body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
      <li >
        <a class="nav-link" href="index.php?web=login" style="color: gray;"><i class="fa fa-sign-in px-2"></i>Login/Register as Artist</a>
      </li>
      
  </div>
</nav> -->
<?php 


 if(!@$_GET['web'])
{
 include 'pages/home.php';   
}

 else if(@$_GET['web']="login")
 {
    include 'pages/login.php';
 }
//  else if(!@$_GET['web']){
//   include 'pages/indexx.php';
// }
   else if(@$_GET['web']="viewcart")
{
  include 'pages/view_cart.php';
}
   

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  <?php require 'admin/footer.php'; ?>
</html>