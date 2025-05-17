<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
</head>

<body style="background-color:rgb(41, 70, 100);">
    <?php
    include("header.php");
    ?>
    <div style=" margin-top:50px">
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <img src="info.avif" class="img-fluid shadow" alt="Info">
                <h5 class="text-center">More info about us</h5>
                <a href="info.php">
                    <button class="btn btn-success my-3" style="margin-left:30%;">Information</button>
                </a>


            </div>
            <div class="col-md-3">
                <img src="doctor.webp" class="img-fluid shadow" alt="Doctor">
                <h5 class="text-center">Hello Doctor! Work with uss</h5>
                <a href="job_doc.php">
                    <button class="btn btn-success my-3" style="margin-left:30%;">Apply Here</button>
                </a>
            </div>
            <div class="col-md-3">
                <img src="patient.avif" class="img-fluid shadow" alt="Patient">
                <h5 class="text-center"> Patient ???</h5>
                <a href="#">
                    <button class="btn btn-success my-3" style="margin-left:30%;">Create Account</button>
                </a>
            </div>

        </div>
    </div>



</body>

</html>