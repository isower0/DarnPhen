<?php
include 'dbconfig.php';
$username = $_POST['username'];

$check_id_market = "CALL seacrh_id_market('$username')";
$result = mysqli_query($conn,$check_id_market);
$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
    
} 

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);


?>