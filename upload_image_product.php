<?php
  
include 'dbconfig.php';

$id_product = $_POST['id_product'];
$folderPath = "images/";
$file_names = $_FILES["file"]["name"];
$targetFilePath = $folderPath . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

for ($i = 0; $i < count($file_names); $i++) {
    $file_name=$file_names[$i];
    
    $extension = end(explode(".", $file_name));
    $original_file_name = pathinfo($file_name, PATHINFO_FILENAME);
    $file_url = $original_file_name . "." . $extension;
    

    if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $folderPath . $file_url)){
        
        $sql = "INSERT INTO image_product(id_product, image) VALUES ('$id_product','$file_name')";
        $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " . mysqli_error());
       } 
    
}



?>