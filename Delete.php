<?php
include 'db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Validate the ID (you should also check if it's an integer)
    if (!is_numeric($id)) {
        die("Invalid ID");
    }

    $sql = "DELETE FROM `details` WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        // Deleted successfully
        echo "Deleted Successfully";
        header("location: display.php");
        exit(); // Terminate script to prevent further execution
    } else {
        // Handle database error
        die("Error: " . mysqli_error($con));
    }
}
?>
