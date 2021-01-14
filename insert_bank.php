<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$id_market = $_POST['id_market'];
$name_bank = $_POST['name_bank'];
$account_number = $_POST['account_number'];
$account_name = $_POST['account_name'];



$sql = "INSERT INTO `bank`( `id_market`, `name_bank`, `account_number`, `account_name`) VALUES ('$id_market','$name_bank','$account_number','$account_name ')";
$result = mysqli_query($conn,$sql);
if ( $result ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
    }

mysqli_close($conn);








?>