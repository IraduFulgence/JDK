<?php 

require '../dbconnect.php';
$email=@$_SESSION['email'];
$password=@$_SESSION['password'];
//$sql="select * from admin where email='$email' and password='$password'";
$res=mysqli_query($con,$sql);
$row=$res->fetch_assoc();
$sql=mysqli_query($con,"select * from admin where email='".$_SESSION['admin']."'");

$num=mysqli_num_rows($res);
if($num != 1){
	session_destroy();
	echo "<script>location.href='login.php';</script>";
}

?>























<!DOCTYPE html>
<html>
<head>
	<title>Online Art Gallery</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css">

      <link rel="icon" href="icon/favicon.png" type="image/x-icon">
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
      </style>
	
</head>

<body>
<div class ="container">

<h1 class="text-info pb-3 mb-3">Control your posts Sir</h1>
<!-- Button trigger modal -->
<button type="button" id="newPost" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#newPage" style="text-align: center; margin-left: 100px; padding-right: 100px;">New post</button>
  <div id="postEditor" style="display: none;">
   
       <!--Modals-->
  <div class="modal fade" id="newPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form class="form" method="post"  action="imageposter.php" enctype="multipart/form-data">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">New Post</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Post Title" name="title">
          </div>
              <div class="form-group">
              <label>Post Body</label>
              <textarea name="author" class="form-control" placeholder="Art Author" ></textarea>
          </div>
          <div class="form-group">
              <label>Price</label>
              <textarea name="price" class="form-control" placeholder="-----/Rwf" ></textarea>
          </div>
          <!-- this helps in controlling what to publish on webpage and what to hide -->
            <div class="form-group">
              <label>Status</label>
             <select id="status"  name="status" class="form-control" required>
        <option selected>Select Status</option>
      <option value="Active">Activate</option>
      <option value="hide">Remove</option>

  </select>
          </div>
              <input type="file" name="fileI" class="form-control" id="uploader" style="display: none;">
        <label for="uploader" style="border: 2px solid black;padding: 10px; margin-left: 20px;">upload Painting</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-block" name="insert">Post</button>
      </div>
        </form>
    </div>
  </div>
</div>
</div>
</div>


<!-- to display the already posts in db to remove the posts or repost -->


<table class="table table-hover table-striped pt-3 mt-3">
           
            
           <thead>
             <tr>
               <th scope="col" class="btn-success px-3 py-3">ID</th>
               <th scope="col" class="btn-success px-3 py-3">Title</th>
               <th scope="col" class="btn-success px-3 py-3">Author</th>
               <th scope="col" class="btn-success px-3 py-3">Arts</th>
               <th scope="col" class="btn-success px-3 py-3">Price</th>
               <th scope="col" class="btn-success px-3 py-3">Status</th>
               
               <th scope="col" class="btn-success px-3 py-3">Time</th>
               <th scope="col" class="btn-success px-3 py-3">Action</th>
             </tr>
           </thead>
           <tbody>
                <?php 
             require '../dbconnect.php';
               $sql="select * from art order by timeposted desc";
         
               $result = mysqli_query($con,$sql);
                 $i=1;
                while($row = $result -> fetch_assoc()){
                   if($i==1)
                     
               ?>
             <tr>
               <td><?php echo $row['id'] ?></td>
               <td><?php echo $row['title'] ?></td>
               <td><?php echo $row['author'] ?></td>
               
      <td><img src="<?php echo $row['paintings'] ?>" style="width: 150px; height: 90px;"></td>
               <td><?php echo $row['status'] ?></td>
               <td><?php echo $row['price'] ?></td>
               <td><?php echo $row['timeposted'] ?></td>
               
               <!--- delete button using link --->
               <td><a class="btn btn-warning" href="#" onclick="confirmdea(<?= $row['id'] ?>)">Deactivate</a></td>
          <td><a class="btn btn-success" href="#" onclick="confirmactivate(<?= $row['id'] ?>)">Activate</a>
          <td><a class="btn btn-danger" href="#" onclick="confirmdelete(<?= $row['id'] ?>)">Delete</a>
          <td><a class="btn btn-warning" href="#" ><?php echo $row['status']?></a>
             </tr>
             <?php 
           
          
          }  ?>
           </tbody>
         </table>


         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  



</body>
</html>






<script type="text/javascript">
  $("#newPost").click(function(){
    $("#postEditor").show();
  });
</script>
<script type="text/javascript">
  $("#UploadVideo").click(function(){
    $("#uploader1").show();
  });
</script>






<!-- php codes to insert a new post -->

<script>
    function confirmdelete(id) {
        var r = confirm("Are you sure to delete?");
        if (r == true) {
          location.href="confirm/delete.php?id="+id;
        }
    }
    function confirmactivate(id){
      var s = confirm("You want to post this painting to system home page?");
      if (s == true){
        location.href="confirm/activate.php?id="+id;
      }

    }
    function confirmdea(id){
      var s = confirm("You want to remove this painting from system home page?");
      if (s == true){
        location.href="confirm/dea.php?id="+id;
      }

    }
</script>