<?php
include 'dbconfig.php';

//$username01 = 'customer01';
//$email01 = 'customer01@gmail.com';
$errors = array(); 

$username =  $_POST['username'];
$password = $_POST['password'];
$passwordencod = md5($password);

$user_check_query = "SELECT * FROM `user` WHERE `username` = '$username' And `password` = '$passwordencod'LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$numrow = mysqli_num_rows($result);

if ($numrow == 1) {
    $arr = array();

    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    
}else{
    echo json_encode(null);
}




mysqli_close($conn);








?>