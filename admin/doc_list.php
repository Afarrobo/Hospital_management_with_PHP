<?php
session_start();
include("../include/header.php");
include("../include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Doctor List - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body style="background-color:rgb(149, 166, 193);">

    <div class="container mt-4">
        <h3 class="mb-4">Doctor List</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, firstname, surname, username, email, gender, phone, country FROM doctors";
                $result = mysqli_query($connect, $query);

                if (!$result) {
                    echo "<tr><td colspan='8' class='text-danger'>Error: " . mysqli_error($connect) . "</td></tr>";
                } elseif (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='8' class='text-center'>No doctors found.</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['surname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['country']) . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>