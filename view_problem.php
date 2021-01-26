<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$problem_type = $_POST['problem_type'];

$sql= "SELECT * FROM `view_problem` WHERE `problem_type` = $problem_type";
$result = mysqli_query($conn,$sql);
 
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