<?php
include '../../config.php';
include '../../function.php';


if (!isset($_SESSION["id"])) {
  header("Location: ../../index/login.php");
}

$id = $_SESSION['id'];

$check_package = mysqli_query($con, "SELECT user_id FROM package WHERE user_id = $id");

if('June 1, 2022, 7:14:05'  < 'June 2, 2022, 22:27:04'){
    echo "yes";
}
else{
    echo "no";
}
?>