<?php
session_start();
unset($_SESSION['patient']);
session_destroy();
header("Location:../include/index.php");
exit();
