<?php
$dbcon = mysqli_connect("localhost", "root", "");
mysqli_select_db($dbcon, "taskdb");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM tasks WHERE id = '$id'";
    mysqli_query($dbcon, $delete_query);

    header("Location: list.php");
    exit();
}
?>
