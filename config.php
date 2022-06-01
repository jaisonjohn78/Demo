<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "peradot";

// $hostname = "peradot.in";
// $username = "u230766858_peradot";
// $password = "Peradot@1";
// $database = "u230766858_peradot";


$con = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

$base_url = "http://localhost/Peradot/";
$my_email = "hardikzz0409@gmail.com";

?>