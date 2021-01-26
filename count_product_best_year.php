<?php
include 'dbconfig.php';

$id_market = $_POST['id_market']; 
$year = $_POST['year']; 

$sql = "SELECT * FROM `view_product_sell` WHERE `id_market` ='$id_market' AND `datetime_payment` LIKE concat( '$year','%') ORDER BY `myCount` DESC LIMIT 5";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>