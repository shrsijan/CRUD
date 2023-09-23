<?php
include 'db.php';
$id = $_GET['updateid'];

// Check if the ID is valid (you should also check if it's an integer)
if (!is_numeric($id)) {
    die("Invalid ID");
}

$sql = "SELECT * FROM `details` WHERE id=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$class = $row['class'];
$email = $row['email'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE `details` SET name=?, class=?, email=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $class, $email, $password, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect to display.php upon successful update
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
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off"
                   value="<?= htmlspecialchars($name) ?>">
        </div>
        <div class="form-group">
            <label>Class</label>
            <input type="text" class="form-control" placeholder="Enter your Class" name="class" autocomplete="off"
                   value="<?= htmlspecialchars($class) ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off"
                   value="<?= htmlspecialchars($email) ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your Password" name="password"
                   autocomplete="off" value="<?= htmlspecialchars($password) ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
