<?php
include 'dbconfig.php';


$id_product = $_POST['id_product'];

$sql = "SELECT `id_Image_product`,`image` FROM `image_product` WHERE `id_product` = '$id_product'";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);






?>