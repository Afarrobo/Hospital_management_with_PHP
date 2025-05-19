<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment</title>

    <!-- ✅ Add Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:rgb(124, 179, 140);">
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
                <h5 class="text-center my-3">Book Appointment</h5>

                <?php
                // Get logged-in patient info from session
                $pat = $_SESSION['patient'];
                $sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");
                $row = mysqli_fetch_array($sel);

                $firstname = $row['firstname'];
                $surname = $row['surname'];
                $gender = $row['gender'];
                $phone = $row['phone'];

                if (isset($_POST['book'])) {
                    $date = $_POST['date'];
                    $sym = $_POST['sym'];

                    if (empty($date) || empty($sym)) {
                        echo "<script>alert('Please fill all fields');</script>";
                    } else {
                        $query = "INSERT INTO appointment (
                            firstname, surname, gender, phone, appointment_date,
                            symptoms, status, date_booked
                        ) VALUES (
                            '$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW()
                        )";

                        $res = mysqli_query($connect, $query);

                        if ($res) {
                            echo "<script>alert('Appointment Booked!!!!');</script>";
                        } else {
                            echo "<script>alert('Error in booking: " . mysqli_error($connect) . "');</script>";
                        }
                    }
                }
                ?>

                <!-- Appointment Form -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form method="post">
                            <label for="date" class="form-label">Appointment Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>

                            <label for="sym" class="form-label mt-3">Symptoms</label>
                            <input type="text" name="sym" id="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms" required>

                            <input type="submit" name="book" class="btn btn-info my-3 w-100" value="Book Appointment">
                        </form>
                    </div>
                </div>

            </div> <!-- End of Main Content -->
        </div> <!-- End of Row -->
    </div> <!-- End of Container -->
</body>

</html>