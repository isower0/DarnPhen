<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 


$id_product = $_POST['id_product'];
$id_user = $_POST['id_user'];
$qty = $_POST['qty'];


$sql_select = "SELECT * FROM `cart` WHERE `id_product` = '$id_product' AND `id_user` = $id_user";
$result = mysqli_query($conn,$sql_select);
$cart = mysqli_fetch_assoc($result);  
/* $arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE); */

if ($cart) {
   if ($cart['id_product'] === $id_product || $cart['id_user'] === $id_user ) {
        $sql_update_qty = "UPDATE `cart` SET `qty` = $qty WHERE `id_product` = '$id_product' AND `id_user` = $id_user";
       $query_update = mysqli_query($conn,$sql_update_qty);
       if ($query_update ) {
        echo json_encode(true);
         }else{
         echo json_encode(false);
         } 
       //echo json_encode('update');
   }
   
}  else {

      $sql = "INSERT INTO `cart` (`id_product`, `id_user`, `qty`) VALUES ('$id_product', $id_user, $qty)";
     $query = mysqli_query($conn,$sql);
 
     if ($query) {
    echo json_encode(true);
     }else{
     echo json_encode(false);
     } 
     //echo json_encode('insert');
    }


mysqli_close($conn);








?>