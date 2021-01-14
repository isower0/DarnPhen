<?php
include 'dbconfig.php';



$id_market = $_POST['id_market']; 

$sql = "SELECT SUM(`paymant_cost`) AS income FROM `history_order` WHERE `id_market` = '$id_market' AND `status` = 5
";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>