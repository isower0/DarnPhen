<?php
include 'dbconfig.php';

$id_market =  $_POST['id_market'];

$sql = "SELECT `id_market`,`id_category`,`name_category` FROM `product_of_market` WHERE `id_market`= '$id_market' GROUP BY `name_category`";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>