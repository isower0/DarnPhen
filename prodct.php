<?php
include 'dbconfig.php';

$id_market =  $_POST['id_market'];

$sql = "CALL showProduct('$id_market')";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>