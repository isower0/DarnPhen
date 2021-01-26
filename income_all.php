<?php
include 'dbconfig.php';


$sql = "SELECT * FROM `income_each_market` ORDER BY `income` DESC limit 5";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>