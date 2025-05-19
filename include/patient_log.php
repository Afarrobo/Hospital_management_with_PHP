<?php
session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname)) {
        echo "<script>alert('Enter Username')</script>";
    } else if (empty($pass)) {
        echo "<script>alert('Enter Password')</script>";
    } else {
        $query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res) == 1) {

            header("Location: ../patient/index.php");
            $_SESSION['patient'] = $uname;
        } else {
            echo "<script>alert('Invailed Account')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient_log_in</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: rgba(108, 112, 243, 0.8);
        }

        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            transition: 0.3s ease-in-out;
        }

        .login-form:hover {
            transform: scale(1.02);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c70f3;
        }

        .btn-info:hover {
            background-color: #5a5ee0;
        }

        a:hover {
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color:rgb(115, 130, 188);">

    <?php include("header.php"); ?>

    <div class=" container-fluid">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 my-5">
                    <div class="login-form">
                        <h4 class="text-center mb-4 text-primary"><i class="fas fa-user-circle"></i> Patient Login</h4>
                        <form method="post">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-lock"></i> Password</label>
                                <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                            </div>

                            <input type="submit" name="login" class="btn btn-info btn-block" value="Login">

                            <p class="text-center mt-3">I don't have an account <a href="acc_01.php">Click Here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>