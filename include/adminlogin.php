<?php
session_start();

include("connection.php");
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();
    if (empty($username)) {

        $error['admin'] = "Enter Username";
    } else if (empty($password)) {
        $error['admin'] = "Enter Password";
    }
    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have login as a admin')</script>";

            $_SESSION['admin'] = $username;
            header("location: admin/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid username');</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin log in</title>
</head>

<body style="background-image: url(admin_bg.jpg);
 background-repeat:no-repeat; background-size:cover;">
    <?php
    include("header.php");
    ?>
    <div style="margin-top:20px ;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <img src="admin_form_pic.avif" class="img-fluid" style="max-width: 300px;">
                    <form method="post" class="my-2">

                        <div class="alert alert-danger">
                            <?php
                            if (isset($error['admin'])) {

                                $show = $error['admin'];
                                echo $show;
                            } else {
                                $show = "";
                            }
                            echo $show;
                            ?>

                        </div>


                        <div class="form-group">
                            <lable style="color: black;">Username</lable>
                            <input type="text" name="uname" class="form-control"
                                autocomplete="off" palceholder="Enter Username">

                        </div>

                        <div class="form-group">
                            <label style="color: black;">Password</label>
                            <input type="password" name="pass" class="form-control">

                        </div>
                        <input type=submit name="login" class="btn btn-success" value="login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>