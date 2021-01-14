<?php
include 'dbconfig.php';

$id_user = $_POST['id_user'];

$sql = "DELETE FROM `user` WHERE `id_user`= '$id_user '";
$result = mysqli_query($conn,$sql);


$callback = array(true);


mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);






?>