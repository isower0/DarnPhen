<?php
include 'dbconfig.php';


$id_user = $_POST['id_user'];

$sql = "CALL view_history_np($id_user)";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>