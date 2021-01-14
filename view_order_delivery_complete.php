<?php
include 'dbconfig.php';


$id_market = $_POST['id_market'];

$sql = "SELECT * FROM `history_order` WHERE (`status` = 5 OR `status` = 6) AND `id_market` = '$id_market' ";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>