<?php

include 'dbconfig.php';

$id_product = $_POST['id_product'];
$name_product = $_POST['name_product'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$product_detail = $_POST['product_detail'];


$sql = "UPDATE `product` SET `name_product`='$name_product',`price`= $price,`unit`='$unit',`product_detail`='$product_detail' WHERE `id_product` = '$id_product'";
$result = mysqli_query($conn,$sql);

if ($result) {
    $callback = true;
}else{
    $callback = false;
}

echo json_encode($callback);

mysqli_close($conn);







?>