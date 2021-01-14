<?php
include 'dbconfig.php';

$id_user =  $_POST['id_user'];
$name_market = $_POST['name_market'];

$sql = "SELECT `name_market`,SUM(`qty`*`price`) AS total_price FROM `cart_view` WHERE `id_user` =$id_user  AND `name_market`= '$name_market' GROUP BY`id_market`";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>