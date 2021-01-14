<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$id_cart = $_POST['id_cart'];
$description_order = $_POST['description_order'];


$sql = "CALL update_description_order($id_cart,'$description_order')";
$result = mysqli_query($conn,$sql);
if ( $result ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
    }

mysqli_close($conn);








?>