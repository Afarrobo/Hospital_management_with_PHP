<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background-color:rgb(236, 137, 66);">

    <?php
    include("../include/header.php");
    include("../include/connection.php");

    // ✅ Count job requests
    $jobRequestCount = 0;
    $jobResult = mysqli_query($connect, "SELECT COUNT(*) AS total FROM doc_job");
    if ($row = mysqli_fetch_assoc($jobResult)) {
        $jobRequestCount = $row['total'];
    }

    // ✅ Count admins
    $adminResult = mysqli_query($connect, "SELECT * FROM admin");
    $adminCount = mysqli_num_rows($adminResult);

    // Doctor count
    $doctorResult = mysqli_query($connect, "SELECT * FROM doctors");
    if (!$doctorResult) {
        die("Doctor query failed: " . mysqli_error($connect)); // Shows actual error
    }
    $doctorCount = mysqli_num_rows($doctorResult);
    // ✅ Count patients
    $p = mysqli_query($connect, "SELECT * FROM patient");
    $pp = mysqli_num_rows($p);

    // ✅ Count reports
    $re = mysqli_query($connect, "SELECT * FROM report");
    $rep = mysqli_num_rows($re);
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

                <!-- Dashboard Cards -->
                <div class="row">

                    <!-- Admin Card -->
                    <div class="col-md-3 bg-success text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $adminCount; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Admin</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Card -->
                    <div class="col-md-3 bg-info text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $doctorCount; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Doctor</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="doc_list.php"><i class="fas fa-user-md fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Card -->
                    <div class="col-md-3 bg-warning text-dark mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp; ?> </h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Patient</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Card -->
                    <div class="col-md-3 bg-danger text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $rep; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Report</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Request Card -->
                    <div class="col-md-3 bg-primary text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $jobRequestCount; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Job Request</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="doc_job_list.php"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Money Card -->
                    <div class="col-md-3 bg-secondary text-white mx-2 mb-3 d-flex align-items-center justify-content-center" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">

                                    <?php

                                    $in = mysqli_query($connect, "SELECT sum(amount_paid) as profit FROM income");

                                    $row = mysqli_fetch_array($in);

                                    $inc = $row['profit'];

                                    ?>

                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "$$inc"; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Money</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="income.php"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>