<?php
include 'dbconfig.php';



$id_cart = $_POST['id_cart'];

$sql = "DELETE FROM `cart` WHERE `id_cart` = $id_cart";
$result = mysqli_query($conn,$sql);


$callback = array(true);


mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);











?>