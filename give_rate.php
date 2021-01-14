<?php
include 'dbconfig.php';


$id_user = $_POST['id_user'];
$id_order = $_POST['id_order'];
$id_order_detail = $_POST['id_order_detail'];
$rate = $_POST['rating'];

$sql = "CALL rate($id_user,$id_order,$id_order_detail,$rate)";
$result = mysqli_query($conn,$sql);

if ( $result ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
    }


mysqli_close($conn);







?>