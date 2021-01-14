<?php
include 'dbconfig.php';

$id_market =  $_POST['id_market'];
$id_category = $_POST['id_category'];

$sql = "CALL showProductCategory('$id_market',$id_category )";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>