<?php
session_start();
// session_unset($_SESSION['ID']);
// session_unset($_SESSION['EMAIL']);
session_destroy();
header("location: ../../index/login.php");
?>