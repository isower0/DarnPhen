<?php
include 'dbconfig.php';

$name_product = $_POST['name_product'];
$name_market = $_POST['name_market'];

$sql = "SELECT * FROM `product_of_market` WHERE `name_product` LIKE '%$name_product%' OR `name_market` = '$name_market'";


$result = mysqli_query($conn,$sql);


$arr = array();

if(mysqli_num_rows($result)>0){

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}
}else{
    $arr[] = null;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);























?>