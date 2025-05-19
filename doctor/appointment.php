<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List for Doctors</title>

    <!-- ✅ Bootstrap CSS for table styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h5 class="text-center my-3">Total Appointments</h5>

                <?php
                $query = "SELECT * FROM appointment WHERE status='Pending'";
                $res = mysqli_query($connect, $query);

                $output = "
                    <table class='table table-bordered text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Appointment Date</th>
                                <th>Symptoms</th>
                                <th>Date Booked</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                ";

                if (mysqli_num_rows($res) < 1) {
                    $output .= "
                        <tr>
                            <td colspan='9' class='text-center'>No Appointment Yet.</td>
                        </tr>
                    ";
                } else {
                    while ($row = mysqli_fetch_array($res)) {
                        $output .= "
                            <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['firstname'] . "</td>
                                <td>" . $row['surname'] . "</td>
                                <td>" . $row['gender'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['appointment_date'] . "</td>
                                <td>" . $row['symptoms'] . "</td>
                                <td>" . $row['date_booked'] . "</td>
                                <td>
                                    <a href='discharge.php?id=" . $row['id'] . "'>
                                        <button class='btn btn-info'>Check!!</button>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }
                }

                $output .= "
                        </tbody>
                    </table>
                ";

                echo $output;
                ?>
            </div>
        </div>
    </div>

</body>

</html>