<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 


$id_category = $_POST['id_category'];
$id_market = $_POST['id_market'];
$name_product = $_POST['name_product'];
$unit =$_POST['unit'];
$price = $_POST['price'];
$product_detail = $_POST['product_detail'];


$insertproduct = "INSERT INTO product(id_product,id_category,id_market,name_product,price,unit,product_detail)
 VALUES(null,$id_category,'$id_market','$name_product',$price,'$unit','$product_detail')";
$result = mysqli_query($conn,$insertproduct);
if ( $result ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
    }

mysqli_close($conn);








?>