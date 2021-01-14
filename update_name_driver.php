<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 


$id_order = $_POST['id_order'];
$name_driver =$_POST['name_driver'];


$sql_update_qty = "CALL update_name_driver($id_order,'$name_driver')";
$query_update = mysqli_query($conn,$sql_update_qty);
    if ($query_update) {
        echo json_encode(true);
    }else{
         echo json_encode(false);
    } 
       //echo json_encode('update');



mysqli_close($conn);








?>