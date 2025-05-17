<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> patient navbar</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-purple {
            background-color: rgb(125, 93, 200);

        }

        .bg-purple a:hover {
            background-color: rgb(163, 50, 137);
        }
    </style>
</head>

<body>
    <div class="list-group bg-purple" style="height: 90vh;">
        <a href="index.php" class="list-group-item list-group-item-action bg-purple text-center text-white border-0">Dashboard</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-purple text-center text-white border-0">Profile</a>

        <a href="doctor.php" class="list-group-item list-group-item-action bg-purple text-center text-white border-0">Book Appointment</a>
        <a href="#" class="list-group-item list-group-item-action bg-purple text-center text-white border-0">Report</a>
        <a href="#" class="list-group-item list-group-item-action bg-purple text-center text-white border-0">Invoice</a>

    </div>
</body>

</html>