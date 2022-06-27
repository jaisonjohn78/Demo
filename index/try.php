<?php

$reference_code =  mysqli_real_escape_string($con, $_POST['refer_input']);
$sql = mysqli_query($con,"SELECT * from users WHERE reference_id == '$reference_code'");

if(mysqli_num_rows($sql)==0){
    echo "<script>alert('Invalid reference  !');</script>";
}else{
    $result =mysqli_fetch_assoc($sql);
    $referred_from  = $result['username'];

$current = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
$current_user = mysqli_fetch_assoc($current);
$refered_to_id= $current_user['id'];
$refered_name = $current_user['username'];

$password = md5($password);
$query = mysqli_query($con, "INSERT INTO users (username, email, phone, password, timestamp, reference_id,code) VALUES ('$username', '$email', '$phone', '$password', '$today', '$reference_id','$code')");

$add = mysqli_query($con,"INSERT INTO `reference`(`user_id`,`username`,`refered_to`,`reference_id`,`timestamp`) VALUES ('$refered_to_id','$referred_from','$refered_name','$reference_code','$today')");
}

?>