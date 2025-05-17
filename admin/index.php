<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Add Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php

    include("../include/header.php");
    include("../include/connection.php")

    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>

            <!-- Main Dashboard Content -->
            <div class="col-md-10">
                <h4 class="my-2">Admin Dashboard</h4>

                <!-- Dashboard Cards in a Row -->
                <div class="row">
                    <div class="col-md-3 bg-success text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">


                                    <?php
                                    $ad = mysqli_query($connect, "SELECT * FROM admin");
                                    $num = mysqli_num_rows($ad);
                                    ?>

                                    <h5 class="my-2 text-white" style="font-size: 30px;">
                                        <?php echo $num; ?>
                                    </h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Admin</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-3 bg-info text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Doctor</h5>
                                </div>
                                <div class="col-md-4">

                                    <a href="#"><i class="fas fa-user-md fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-3 bg-warning text-dark mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Patient</h5>
                                </div>
                                <div class="col-md-4">

                                    <a href="#"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="col-md-3 bg-danger text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Report</h5>
                                </div>
                                <div class="col-md-4">

                                    <a href="#"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-3 bg-primary text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Job Request</h5>
                                </div>
                                <div class="col-md-4">

                                    <a href="#"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 bg-secondary text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Money</h5>
                                </div>
                                <div class="col-md-4">

                                    <a href="#"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional if you use interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>