<?php
session_start();
include("../include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .dashboard-box {
            height: 150px;
            border-radius: 10px;
            color: white;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .dashboard-box h5 {
            font-weight: bold;
        }

        .dashboard-icon {
            font-size: 2.5rem;
        }
    </style>
</head>

<body>

    <?php include("../include/header.php"); ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>


            <div class="col-md-10">
                <h5 class="my-4">Doctor's Dashboard</h5>

                <!-- Dashboard Row -->
                <div class="row">

                    <div class="col-md-4 mb-3">
                        <div class="dashboard-box bg-info d-flex justify-content-between align-items-center">
                            <h5>My Profile</h5>
                            <h5 class="text-black my-2" style="font-size:40px;">0</h5>
                            <h5 class="text-black ">Total</h5>
                            <a href="profile.php"><i class="fas fa-user-circle dashboard-icon"></i></a>
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">

                        <div class="dashboard-box bg-success d-flex justify-content-between align-items-center">
                            <h5>Appointments</h5>

                            <?php
                            $app = mysqli_query($connect, "SELECT * FROM appointment
                            WHERE status ='Pendding' ");
                            $appoint = mysqli_num_rows($app);


                            ?>

                            <h5 class="text-black my-2" style="font-size:40px;"><?php echo $appoint; ?></h5>
                            <h5 class="text-black ">Total</h5>
                            <a href="appointment.php"><i class="fas fa-calendar-check dashboard-icon"></i></a>
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">
                        <?php
                        $p = mysqli_query($connect, "SELECT * FROM patient");
                        $pp = mysqli_num_rows($p);
                        ?>
                        <div class="dashboard-box bg-warning d-flex justify-content-between align-items-center">
                            <h5>Patients</h5>
                            <h5 class="text-black my-2" style="font-size:40px;"><?php echo $pp; ?></h5>
                            <h5 class="text-black ">Total</h5>
                            <a href="patient.php"> <i class="fas fa-users dashboard-icon"></i> </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>