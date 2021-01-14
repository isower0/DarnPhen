<?php
include 'dbconfig.php';

$id_order = $_POST['id_order'];

$sql = "SELECT * FROM `view_order` WHERE `id_order` = $id_order ";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>