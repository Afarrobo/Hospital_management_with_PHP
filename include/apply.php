<?php
include("connection.php");

$show = "";

if (isset($_POST['apply'])) {
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if (empty($firstname)) {
        $error['apply'] = "Enter Firstname";
    } else if (empty($surname)) {
        $error['apply'] = "Enter Surname";
    } else if (empty($username)) {
        $error['apply'] = "Enter Username";
    } else if (empty($email)) {
        $error['apply'] = "Enter Email Address";
    } else if (empty($gender)) {
        $error['apply'] = "Select Your Gender";
    } else if (empty($phone)) {
        $error['apply'] = "Enter Phone Number";
    } else if (empty($country)) {
        $error['apply'] = "Select Country";
    } else if (empty($password)) {
        $error['apply'] = "Enter Password";
    } else if ($confirm_password != $password) {
        $error['apply'] = "Both Passwords do not match";
    }

    if (count($error) == 0) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // ✅ Only use columns that exist in your table
        $query = "INSERT INTO doctors (firstname, surname, username, email, gender, phone, country, password)
                  VALUES ('$firstname', '$surname', '$username', '$email', '$gender', '$phone', '$country', '$hashed_password')";

        $result = mysqli_query($connect, $query);

        if ($result) {
            header("Location: doctorlogin.php");
            exit();
        } else {
            $show = "<h5 class='text-center alert alert-danger'>Database Error: " . mysqli_error($connect) . "</h5>";
        }
    } else {
        $s = $error['apply'];
        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now!!!</title>
</head>

<body style="background-color:rgb(173, 160, 203);">
    <?php
    include("header.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now!!!</h5>
                    <div>
                        <?php echo $show;   ?>
                    </div>


                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if (isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">



                        </div>



                        <div class="form-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Londeon">London</option>
                                <option value="Italy">Italy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                        <p>I already have an account <a href="doctorlogin.php">Click here</a></p>



                    </form>


                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>




</body>

</html>