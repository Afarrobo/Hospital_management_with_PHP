<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Profile Page</title>
</head>

<body style="background-color:rgb(113, 155, 186);">

    <?php include("../include/header.php"); ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>

                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <?php
                                    if (isset($_SESSION['patient'])) {
                                        $pat = $_SESSION['patient'];
                                        $query = "SELECT * FROM patient WHERE username='$pat'";
                                        $res = mysqli_query($connect, $query);
                                        $row = mysqli_fetch_array($res);
                                    } else {
                                        echo "<p>Please login first.</p>";
                                        $row = null;
                                    }
                                    ?>

                                    <!-- Optionally, display patient info here -->

                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-center my-2">Change Username</h5>
                                <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter New Username" required>
                                    <br />
                                    <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                </form>

                                <br /><br />

                                <h5 class="text-center my-2">Change Password</h5>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" required>
                                    </div>
                                    <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>