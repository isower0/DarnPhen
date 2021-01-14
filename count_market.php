<?php
include 'dbconfig.php';



$sql = 'SELECT COUNT(`id_user`) AS amout_market FROM `user` WHERE `user_type` = 3';

$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);

?>