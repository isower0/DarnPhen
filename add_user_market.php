<?php
include 'dbconfig.php';

//สร้าง username & password ให้ตลาด และเพิ่มตลาด
$errors = array(); 

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$name_market =$_POST['name_market'];
$name_owner = $firstname.' '.$lastname;
$address_market = $_POST['address_market'];
$phone_market = $_POST['phone_market'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

//check username
$user_check_query = "SELECT `username`,`email` FROM `user` WHERE `username` = '$username'LIMIT 1";        
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
if ($user) {
    if ($user['username'] === $username ) {
        array_push($errors,false);
        echo json_encode($errors); 
    }else{
        array_push($errors,false);
        echo json_encode($errors);
    }  
} 

if (count($errors) == 0) {
    $passwordencod = md5($password);
    $sql = "CALL insertusermarket('$username','$passwordencod','$firstname'
            ,'$lastname','$email','$phone','$name_market','$name_owner'
            ,'$address_market','$phone_market',$longitude,$latitude)";
   $result2 = mysqli_query($conn, $sql);
   if ( $result2 ) {
    echo json_encode(true); 
    }else{
        echo json_encode(null);
       }  
    
} 


mysqli_close($conn);







?>