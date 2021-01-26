<?php
include 'dbconfig.php';

$id_market = $_POST['id_market']; 
$year = $_POST['year']; 
$sql = "SELECT MONTHNAME(`datetime_payment`) AS month ,  SUM(`paymant_cost`) AS income 
FROM `history_order` WHERE `status` = 5 AND `id_market` = '$id_market'  AND `datetime_payment` LIKE concat( '$year','%')  GROUP BY MONTH(`datetime_payment`) 
 ORDER BY MONTH(`datetime_payment`)";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>