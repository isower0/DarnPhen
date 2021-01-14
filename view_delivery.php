<?php
include 'dbconfig.php';

$id_market = $_POST['id_market'];

$sql = "SELECT `id_order`,`address_customer`,
        `delivery_long`,`delivery_lat`,`longitude_market`,`latitude_market` FROM `history_order` 
        WHERE  (`status` = 3 OR `status` = 4) 
        AND `id_market` = '$id_market' GROUP BY `id_order`";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>