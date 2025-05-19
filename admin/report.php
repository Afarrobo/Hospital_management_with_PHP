<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h5 {
            font-weight: bold;
            margin-top: 20px;
        }

        .report-table {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            vertical-align: middle !important;
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .no-report {
            text-align: center;
            color: red;
            font-weight: bold;
            padding: 20px;
        }
    </style>
</head>

<body style="background-color:rgb(155, 115, 188);">

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>


            <div class="col-md-10">
                <h5 class="text-center">Total Report</h5>

                <div class="report-table">
                    <?php
                    $query = "SELECT * FROM report";
                    $res = mysqli_query($connect, $query);

                    $output = "
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Username</th>
                                <th>Date Sent</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                        <tr>
                            <td colspan='5' class='no-report'>No Report Yet</td>
                        </tr>
                        ";
                    } else {
                        while ($row = mysqli_fetch_array($res)) {
                            $output .= "
                            <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['message'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['date_send'] . "</td>
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
    </div>

</body>

</html>