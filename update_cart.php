<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 


$id_cart= $_POST['id_cart'];
$qty = $_POST['qty'];


/* $sql_select = "SELECT * FROM `cart` WHERE `id_cart` = '$id_cart'";
$result = mysqli_query($conn,$sql_select);
$cart = mysqli_fetch_assoc($result);   */
/* $arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE); */

$sql_update_qty = "UPDATE `cart` SET `qty` = $qty WHERE `id_cart` = $id_cart";
$query_update = mysqli_query($conn,$sql_update_qty);
    if ($query_update ) {
        echo json_encode(true);
    }else{
         echo json_encode(false);
    } 
       //echo json_encode('update');



mysqli_close($conn);








?>