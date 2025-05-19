<?php
session_start();
include("connection.php");

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $current_status = mysqli_real_escape_string($connect, $_POST['current_status']);
    $academic_info = mysqli_real_escape_string($connect, $_POST['academic_info']);

    $query = "INSERT INTO doc_job (name, current_status, Academic_info) 
              VALUES ('$name', '$current_status', '$academic_info')";

    if (mysqli_query($connect, $query)) {
        $message = "Job application submitted successfully! wait for our reply. Thank You .";
    } else {
        $message = "❌ Error: " . mysqli_error($connect);
    }
}




$jobRequestCount = 0;
$result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM doc_job");
if ($row = mysqli_fetch_assoc($result)) {
    $jobRequestCount = $row['total'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Job Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Apply for Job</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="current_status">Current Status:</label>
                <input type="text" class="form-control" name="current_status" required>
            </div>
            <div class="form-group">
                <label for="academic_info">Academic Information:</label>
                <textarea class="form-control" name="academic_info" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
    </div>

</body>

</html>

<?php
mysqli_close($connect);
?>