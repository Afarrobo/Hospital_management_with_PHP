<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Total Income</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
                <h3 class="text-center my-3">💰 Total Income Records</h3>

                <?php
                $query = "SELECT * FROM income";
                $res = mysqli_query($connect, $query);

                if (!$res) {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($connect) . "</div>";
                } elseif (mysqli_num_rows($res) > 0) {
                    echo "
                    <table class='table table-bordered table-hover'>
                        <thead class='table-dark'>
                            <tr>
                                <th>#</th>
                                <th>Doctor</th>
                                <th>Patient</th>
                                <th>Discharge Date</th>
                                <th>Amount Paid (৳)</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";

                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "
                            <tr>
                                <td>{$i}</td>
                                <td>" . htmlspecialchars($row['doctor']) . "</td>
                                <td>" . htmlspecialchars($row['patient']) . "</td>
                                <td>" . htmlspecialchars($row['date_discharge']) . "</td>
                                <td>" . htmlspecialchars($row['amount_paid']) . "</td>
                            </tr>
                        ";
                        $i++;
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-warning text-center'>No income records found.</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>