<?php
include 'dbconfig.php';

//$username01 = 'customer01';
//$email01 = 'customer01@gmail.com';
$errors = array(); 

$username =  $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$usertype= 2;//customer

$user_check_query = "SELECT `username`,`email` FROM `user` WHERE `username` = '$username' OR `email` = '$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    if ($user['username'] === $username || $user['email']===$email ) {
        array_push($errors,false);
        echo json_encode($errors);       
    }   
    
}
if (count($errors) == 0) {
    $passwordencod = md5($password);
    $sql = "INSERT INTO `user`(`username`, `password`, `firstname`, `lastname`, `email`, `phone`, `user_type`) VALUES ('$username', '$passwordencod', '$firstname', '$lastname','$email', '$phone',$usertype)";
   $result2 = mysqli_query($conn, $sql);
   if ( $result2 ) {
    echo json_encode(true); 
}else{
    echo json_encode(null); 
   }
    
}


mysqli_close($conn);







?>