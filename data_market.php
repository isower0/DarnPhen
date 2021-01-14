<?php

include 'dbconfig.php';

$id_market = $_POST['id_market'];
$sql = "SELECT * FROM `market` WHERE `id_market` = '$id_market'";

$result = mysqli_query($conn, $sql);

$arr = array();
if ($id_market != null) {
while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}
}else{
    
   array_push($arr, 'error');
}

echo json_encode($arr,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
















?>