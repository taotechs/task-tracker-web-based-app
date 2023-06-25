<?php
$dbcon = mysqli_connect("localhost", "root", "", "taskdb"); // Update with your database credentials
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($dbcon, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $update_query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($dbcon, $update_query);
        header("Location: list.php");
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}

mysqli_close($dbcon);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form method="post" action="">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>
