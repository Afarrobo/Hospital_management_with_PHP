<?php
session_start();
include("../include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Job Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:rgb(227, 219, 132);">

    <?php include("../include/header.php"); ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Doctor Job Applications</h2>

        <?php
        $query = "SELECT * FROM doc_job";
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo '<div class="alert alert-danger">Query failed: ' . mysqli_error($connect) . '</div>';
        } elseif (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Current Status</th>
                    <th>Academic Info</th>
                </tr>
              </thead>';
            echo '<tbody>';

            $serial = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                    <td>' . $serial++ . '</td>
                    <td>' . htmlspecialchars($row['name'] ?? '') . '</td>
                    <td>' . htmlspecialchars($row['current_status'] ?? '') . '</td>
                    <td>' . htmlspecialchars($row['Academic_info'] ?? '') . '</td>
                  </tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-warning text-center">No job applications found.</div>';
        }
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>