<?php
include("connection.php");
session_start();

$show = "";

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($uname)) {
        $error['login'] = "Enter Username";
    } else if (empty($password)) {
        $error['login'] = "Enter Password";
    }

    if (count($error) == 0) {
        // Get doctor record by username
        $q = "SELECT * FROM doctors WHERE username='$uname'";
        $qq = mysqli_query($connect, $q);
        $row = mysqli_fetch_array($qq);

        if ($row) {
            // Check password using password_verify()
            if (password_verify($password, $row['password'])) {
                // Check status
                if ($row['status'] == "Pending") {
                    $error['login'] = "Please Wait For the admin to confirm";
                } else if ($row['status'] == "Rejected") {
                    $error['login'] = "Try again Later";
                } else {
                    $_SESSION['doctor'] = $uname;
                    echo "<script>alert('Login Successful'); window.location='doctor/index.php';</script>";
                    exit();
                }
            } else {
                $error['login'] = "Incorrect Password";
            }
        } else {
            $error['login'] = "User Not Found";
        }
    }

    if (isset($error['login'])) {
        $l = $error['login'];
        $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Login</title>

    <!-- Bootstrap CSS (Include this if not already added in header.php) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: rgb(109, 209, 126);
        }

        .login-box {
            margin-top: 80px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .login-box h5 {
            font-weight: bold;
            color: #333;
        }

        .form-group label {
            font-weight: 500;
        }

        a {
            color: rgb(10, 11, 11);
        }
    </style>
</head>

<body style="background-color:rgb(146, 213, 202);">

    <?php include("header.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-box">
                    <h5 class="text-center mb-4">Doctor Login</h5>

                    <div>
                        <?php echo $show; ?>
                    </div>

                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success btn-block" value="Login">
                        <p class="mt-3 text-center">Don't have an account? <a href="apply.php">Apply Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>