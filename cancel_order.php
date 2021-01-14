<?php
include 'dbconfig.php';

$id_order = $_POST['id_order'];

$sql = "DELETE FROM `orders` WHERE `id_order` = $id_order";
$result = mysqli_query($conn,$sql);


$callback = array(true);


mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);






?>