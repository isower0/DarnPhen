<?php

include 'dbconfig.php';



$sql_last_id = "SELECT MAX(`id_order`) AS maxid FROM `orders`";
$res = mysqli_query($conn,$sql_last_id); // ทำคำสั่ง
$ret = mysqli_fetch_assoc($res); // อ่านค่า
$last_id = intval($ret['maxid']); 

echo json_encode($last_id,JSON_UNESCAPED_UNICODE);

?>