<?php
include 'dbconfig.php';

// เพิ่มตลาด
$errors = array(); 

$id_user = $_POST['id_user'];
$description_problem = $_POST['description_problem'];
$problem_type = $_POST['problem_type'];




$sql = "INSERT INTO `problem`( `id_ user`, `description_problem`, `problem_type`) VALUES ($id_user,'$description_problem',$problem_type)";

$result = mysqli_query($conn,$sql);
if ( $result ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
    }

mysqli_close($conn);








?>