<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$id_user = $_POST['id_user'];



$sql = "CALL count_cart($id_user)";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

echo json_encode($arr,JSON_UNESCAPED_UNICODE); 



mysqli_close($conn);








?>