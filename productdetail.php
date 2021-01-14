<?php
include 'dbconfig.php';


$id_product =  $_POST['id_product'];

$sql = "SELECT p.`id_product`,p.`id_category`,p.`id_market`,p.`name_product`,p.`price`,p.`unit`,p.`product_detail`,i.image FROM `product` p LEFT JOIN image_product i ON p.`id_product` = i.id_product WHERE p.`id_product` = '$id_product' GROUP BY p.`id_product`;";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>