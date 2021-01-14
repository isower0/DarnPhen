<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 



$id_user = $_POST['id_user'];
$name_market = $_POST['name_market'];



$sql_select = "CALL view_cart_group($id_user ,'$name_market')";
$result = mysqli_query($conn,$sql_select);
 
 $arr = array();
 

    
    while($row = mysqli_fetch_assoc($result)){
    
        $arr[] = $row;    
     }


echo json_encode($arr,JSON_UNESCAPED_UNICODE); 


mysqli_close($conn);








?>