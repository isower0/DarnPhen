<?php
include 'dbconfig.php';
include 'uplloadconfig.php';

$storage = new storage();

$id_Image_product = $_POST['id_Image_product'];
$image = $_POST['image'];

$folderPath = "images/";

$file = $folderPath.$image;

$sql = "DELETE FROM `image_product` WHERE `id_Image_product` = $id_Image_product";
$result = mysqli_query($conn,$sql);

if ($result) {
    if ($storage->deleteObject('images-market', $image)){  
        $callback = array(true);
        }else{
        $callback = array(false);
        }
}else{
    $callback = array(false);
}




mysqli_close($conn);
echo json_encode($callback,JSON_UNESCAPED_UNICODE);











?>