<?php

include 'dbconfig.php';

$id_market = $_POST['id_market'];
$name_market = $_POST['name_market'];
$name_owner = $_POST['name_owner'];
$address_market = $_POST['address_market'];
$phone_market = $_POST['phone_market'];


$sql = "UPDATE `market` SET `name_market`='$name_market ',`name_owner`='$name_owner',`address_market`='$address_market',`phone_market`= '$phone_market' WHERE `id_market` ='$id_market'";
$result = mysqli_query($conn,$sql);

if ($result) {
    $callback = true;
}else{
    $callback = false;
}

echo json_encode($callback);

mysqli_close($conn);







?>