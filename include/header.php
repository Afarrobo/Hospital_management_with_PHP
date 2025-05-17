<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base_url = "/Hospital/";

if (strpos($_SERVER['SCRIPT_FILENAME'], "admin") !== false) {
    $logout_path = $base_url . "admin/logout.php";
} else {
    $logout_path = $base_url . "admin/logout.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxHbVHMuX3LLhkxg4ZLY6oF8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha512-TawcSfIUO8yB0Or8FXEDW2X32Q71ZGAOYVVwe7n3EsoyQb+iMZbodI6RnQ4JDcItNoO3TmwP7/bD89vhQA4zTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .bg-dark-blue {
            background-color: #002147;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark-blue">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Hospital Management System</a>
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <?php
                if (isset($_SESSION['admin'])) {
                    $user = $_SESSION['admin'];
                    echo '
                        <li class="nav-item px-2">
                           <a class="nav-link text-white" href="' . $base_url . '/admin/index.php">' . $user . '</a>

                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="' . $logout_path . '">Logout</a>
                        </li>';
                } else if (isset($_SESSION['doctor'])) {
                    $user = $_SESSION['doctor'];
                    echo '
                         <li class="nav-item"><a href=" /Hospital/doctor/index.php" class="nav-link text-white">' . $user . '</a></li>
                        <li class="nav-item"><a href="../admin/logout.php" class="nav-link text-white">logout</a></li>
                              ';
                } else {
                    echo '

                       <li class="nav-item px-2">
                            <a class="nav-link text-white" href="index.php">Home</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="adminlogin.php">Admin</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="doctorlogin.php">Doctor</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="#">Patient</a>
                        </li>
                
                            
                        ';
                }
                ?>
            </ul>
        </div>
    </nav>
</body>

</html>