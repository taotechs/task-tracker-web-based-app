<!DOCTYPE html>
<html>
<head>
    <title>list Page</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<style>
    .cl_white {
        color: rgb(255, 255, 255);
    }

    section {
        width: 100vw;
        height: 100vh;
        padding: 50px;
    }

    .table tbody tr td {
        color: black;
        font-weight: bold;
    }
</style>
<!-- Body STARTS from here -->
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">TASKY</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">Home</a></li>
            <li><a href="addtask.php">Add Task</a></li>
            <li class="active"><a href="list.php">List Task</a></li>
            <!-- <li><a href="member_page.php">Customer's Section</a></li> -->
        </ul>
    </div>
</nav>
<!-- Section Goes Here -->
<section id="home" style="background: url(images/bg5.jpg); background-size: 100% 100%" class="cl_white text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Task List</h3>
                <form method="post" action="">
                    <input class="btn btn-primary" type="submit" name="refresh" value="Refresh">
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dbcon = mysqli_connect("localhost", "root", "");
                        mysqli_select_db($dbcon, "taskdb"); // This is where we make a connection

                        if (isset($_POST['refresh'])) {
                            $query = "SELECT * FROM tasks";
                            $result = mysqli_query($dbcon, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<footer class="navbar navbar-default navbar-fixed-button">
    <div class="container">
        <p class="text-center" style="padding: 12px">
            Copyright - Samuel Softwares
        </p>
    </div>
</footer>
</body>
</html>
