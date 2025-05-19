<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Invoice</title>
    <!-- Optional: Add Bootstrap for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color:rgb(148, 195, 127);">

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <?php
                    $pat = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE username='$pat'";
                    $res = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($res);
                    $fname = $row['firstname'];

                    $querys = mysqli_query($connect, "SELECT * FROM income WHERE patient='$fname'");

                    $output = "";
                    $output = "
                    <table class='table table-bordered'>
                    <tr>
                        <td>ID</td>
                        <td>Doctor</td>
                        <td>Patient</td>
                        <td>Date Discharge</td>
                        <td>Amount Paid</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                    ";

                    if (mysqli_num_rows($querys) < 1) {
                        $output .= "
                        <tr>
                            <td colspan='7' class='text-center'>No Invoice Yet</td>
                        </tr>
                        ";
                    }

                    while ($row = mysqli_fetch_array($querys)) {
                        $output .= "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['doctor'] . "</td>
                            <td>" . $row['patient'] . "</td>
                            <td>" . $row['date_discharge'] . "</td>
                            <td>" . $row['amount_paid'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>
                                <a href='view.php?id=" . $row['id'] . "'>
                                    <button class='btn btn-info'>View</button>
                                </a>
                            </td>
                        </tr>
                        ";
                    }

                    $output .= "</table>";

                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>