<?php
include 'db.php';
$id=$_GET['updateid'];
$sql="Select * from `details` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$class=$row['class'];
$email=$row['email'];
$password=$row['password'];
if(isset($_POST['submit'])){
 $name=$_POST['name'];
 $class=$_POST['class'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $sql="update `details` set id= $id, name='$name', class=$class, email='$email',password=
'$password' where id=$id";
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
autocomplete="off" value=<?php echo $name; ?> >
 </div>
 <div class="form-group">
 <label >Class</label>
 <input type="text" class="form-control" placeholder="Enter your Class" name="class"
autocomplete="off" value=<?php echo $class;?> >
 </div>
 <div class="form-group">
 <label >Email</label>
 <input type="email" class="form-control" placeholder="Enter your Email" name="email"
autocomplete="off" value=<?php echo $email?> >
 </div>
 <div class="form-group">
 <label >Password</label>
 <input type="password" class="form-control" placeholder="Enter your Password"
name="password" autocomplete="off" value=<?php echo $password?> >
 </div>
 <button type="submit" class="btn btn-primary" name="submit" >Update</button>
</form></div> </body> </html>