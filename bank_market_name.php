<?php
include 'dbconfig.php';


$errors = array(); 

$name_market = $_POST['name_market'];

$sql = "SELECT * FROM `bank_of_market` WHERE `id_market` = '$name_market'";
$result = mysqli_query($conn,$sql);

$arr = [];

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