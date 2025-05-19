<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Patient</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color:rgb(213, 159, 192);">
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 " style="margin-left:-30px;">
                <?php include("sidenav.php"); ?>
            </div>

            <div class="col-md-10">
                <h5 class="text-center my-3">Total Patient</h5>

                <?php
                $query = "SELECT * FROM patient";
                $res = mysqli_query($connect, $query);

                $output = "";

                $output .= "
                <table class='table table-bordered'>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Date Of Reg.</th>
                        <th>Action</th>
                    </tr>
                ";

                if (mysqli_num_rows($res) < 1) {
                    $output .= "
                        <tr>
                            <td class='text-center' colspan='10'>No Patient Yet</td>
                        </tr>
                    ";
                } else {
                    while ($row = mysqli_fetch_array($res)) {
                        $output .= "
                            <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['firstname'] . "</td>
                                <td>" . $row['surname'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['gender'] . "</td>
                                <td>" . $row['country'] . "</td>
                                <td>" . $row['date_reg'] . "</td>
                                <td>
                                    <a href='view.php?id=" . $row['id'] . "'>
                                        <button class='btn btn-info btn-sm'>View</button>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }
                }

                $output .= "</table>";

                echo $output;
                ?>
            </div>
        </div>
    </div>

</body>

</html>