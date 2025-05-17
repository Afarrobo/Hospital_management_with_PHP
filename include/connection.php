<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "hospital";

$connect = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
