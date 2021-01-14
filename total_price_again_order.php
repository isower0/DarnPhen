<?php
include 'dbconfig.php';

$id_order =  $_POST['id_order'];


$sql = "CALL total_price_order($id_order)";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>