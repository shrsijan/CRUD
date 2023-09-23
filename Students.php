<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation (You can add more validation as needed)
    if (empty($name) || empty($class) || empty($email) || empty($password)) {
        die("Please fill in all fields.");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO `details` (name, class, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $class, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect to display.php upon successful insert
        header('location: display.php');
        exit();
    } else {
        // Handle errors gracefully
        die("Error: " . mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Info</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Class</label>
            <input type="text" class="form-control" placeholder="Enter your Class" name="class" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password"
                   autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
</body>
</html>
