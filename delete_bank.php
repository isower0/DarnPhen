<?php
include 'dbconfig.php';

$id_bank = $_POST['id_bank'];

$sql = "DELETE FROM `bank` WHERE `id_bank` = '$id_bank'";
$result = mysqli_query($conn,$sql);


$callback = array(true);


mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);






?>