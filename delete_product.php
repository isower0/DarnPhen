<?php
include 'dbconfig.php';

$id_product = $_POST['id_product'];

$sql = "DELETE FROM `product` WHERE `id_product` = '$id_product'";
$result = mysqli_query($conn,$sql);


$callback = array(true);


mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);






?>