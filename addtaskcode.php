<?php
include("connection.php"); // This is where we make a connection

if (isset($_POST['add'])) // This notifies our action initiated through the submit button
{
    // Variable declaration
    $title = $_POST['title'];
    $description = $_POST['description'];


    // Validation
    if ($title == '' || $description == '') {
        echo "<script>alert('Please check for errors')</script>";
        echo "<script>window.open('register.php', '_self')</script>";
        exit();
    }


    // Now we insert our values into the database
    $insert_user = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";

    if (mysqli_query($dbcon, $insert_user)) {
        echo "<script>window.open('list.php', '_self')</script>";
    }
}
?>
