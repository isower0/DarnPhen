<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 


$id_order= $_POST['id_order'];


$sql_update_qty = "UPDATE `payment` SET `status`= 3 WHERE `id_order` = $id_order";
$query_update = mysqli_query($conn,$sql_update_qty);
    if ($query_update) {
        echo json_encode(true);
    }else{
         echo json_encode(false);
    } 
       //echo json_encode('update');



mysqli_close($conn);








?>