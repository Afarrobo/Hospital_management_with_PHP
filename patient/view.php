<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>

    <!-- ✅ Add Bootstrap CDN here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:rgb(189, 134, 183);">

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Side Navigation -->
            <div class="col-md-2">
                <?php include("sidenav.php"); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h5 class="text-center my-4">View Invoice</h5>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            // Prevent SQL Injection (better practice)
                            $id = mysqli_real_escape_string($connect, $id);

                            $query = "SELECT * FROM income WHERE id='$id'";
                            $res = mysqli_query($connect, $query);

                            if ($res && mysqli_num_rows($res) > 0) {
                                $row = mysqli_fetch_array($res);
                        ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Invoice Details</th>
                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date Discharge</td>
                                        <td><?php echo $row['date_discharge']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount Paid</td>
                                        <td><?php echo $row['amount_paid']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $row['description']; ?></td>
                                    </tr>
                                </table>
                        <?php
                            } else {
                                echo "<div class='alert alert-warning'>Invoice not found.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>No invoice ID provided in URL.</div>";
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JS for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>