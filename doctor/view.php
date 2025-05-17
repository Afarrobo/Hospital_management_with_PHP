<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px">
                <?php include("sidenav.php"); ?>
            </div>

            <div class="col-md-10">
                <h5 class="text-center my-3">View Patient Details</h5>

                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Secure query using prepared statement
                    $stmt = $connect->prepare("SELECT * FROM patient WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    if ($res->num_rows > 0) {
                        $row = $res->fetch_assoc();
                    } else {
                        echo "<div class='alert alert-danger'>No patient found with that ID.</div>";
                        exit();
                    }
                } else {
                    echo "<div class='alert alert-warning'>No ID provided in the URL.</div>";
                    exit();
                }
                ?>

                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" colspan="2">Details</th>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><?php echo htmlspecialchars($row['surname']); ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><?php echo htmlspecialchars($row['country']); ?></td>
                            </tr>
                            <tr>
                                <td>Date Registered</td>
                                <td><?php echo htmlspecialchars($row['date_reg']); ?></td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>