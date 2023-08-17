<?php
require 'db.php';
if(isset($_POST['submit'])){
 $name=$_POST['name'];
 $class=$_POST['class'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $sql="INSERT INTO `details`( name ,class, email, password) VALUES('$name', '$class','
$email', '$password')";
 $result=mysqli_query($con,$sql);
 if($result){
 // echo "Data inserted successsfully";
 header('location:display.php');
 }else{
 die(mysqli_error($con));
 }
}
?>
<!doctype html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
 <title>Info</title>
 </head>
 <body>
 <div class=" container my-5" >
 <form method="post">
 <div class="form-group">
 <label >Name</label>
 <input type="text" class="form-control" placeholder="Enter your Name" name="name"
autocomplete="off">
 </div>
 <div class="form-group">
 <label >Class</label>
 <input type="text" class="form-control" placeholder="Enter your Class" name="class"
autocomplete="off">
 </div>
 <div class="form-group">
 <label >Email</label>
 <input type="email" class="form-control" placeholder="Enter your Email" name="email"
autocomplete="off">
 </div>
 <div class="form-group">
 <label >Password</label>
 <input type="password" class="form-control" placeholder="Enter your password"
name="password" autocomplete="off">
 </div>
 <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
 </div>
 </body>
</html>