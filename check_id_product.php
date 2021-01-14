
<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$id_market = $_POST['id_market'];
$name_product = $_POST['name_product'];

 
$sql = "SELECT `id_product` FROM `product` WHERE `id_market`='$id_market' AND `name_product`= '$name_product'";
$result = mysqli_query($conn,$sql);


$arr = array();

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

mysqli_close($conn);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);








?>