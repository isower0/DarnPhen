<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 



$id_user = $_POST['id_user'];



$sql_select = "CALL view_cart($id_user)";
$result = mysqli_query($conn,$sql_select);
 
 $arr = array();
 
if (mysqli_num_rows($result)>0) {
    
    while($row = mysqli_fetch_assoc($result)){
    
        $arr[] = $row;    
     
}
}else{
    $arr[] = null;
}
   

echo json_encode($arr,JSON_UNESCAPED_UNICODE); 


mysqli_close($conn);








?>