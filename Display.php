<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=, initial-scale=1.0">
 <title>Details</title>
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<button class="btn btn-primary my-5"><a href="students.php" class="text-light">Add User
</a>
</button>
<table class="table">
 <thead>
 <tr>
 <th scope="col">Id</th>
 <th scope="col">Name</th>
 <th scope="col">Class</th>
 <th scope="col">Email</th>
 <th scope="col">Password</th>
 <th scope="col">Operations</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $sql="Select * from `details`";
 $result=mysqli_query($con,$sql);
 if($result){
 while($row=mysqli_fetch_assoc($result))
 {
 $id=$row['Id'];
 $name=$row['name'];
 $class=$row['class'];
 $email=$row['email'];
 $password=$row['password'];
 echo '<tr>
 <th scope="row">'.$id.'</th>
 <td>'.$name.'</td>
 <td>'.$class.'</td>
 <td>'.$email.'</td>
 <td>'.$password.'</td>
 <td>
 <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="textlight">Update</a></button>
<button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="textlight">Delete</a></button>
 </td>
 </tr>'; }
 }
 ?>
 </body>
</html>