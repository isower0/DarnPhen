<?php
  
include 'dbconfig.php';
include 'uplloadconfig.php';

$storage = new storage();

date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
$numrand = (mt_rand());

$id_product = $_POST['id_product'];
$folderPath = "images/";
$file_names = $_FILES["file"]["name"];
$targetFilePath = $folderPath . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

for ($i = 0; $i < count($file_names); $i++) {
    $file_name= $file_names[$i];
    
    $extension = end(explode(".", $file_name));
    $original_file_name = pathinfo($numrand.$date.$file_name, PATHINFO_FILENAME);
    $file_url = $original_file_name . "." . $extension;
    

    if($storage->uploadObject('images-market',$file_url,$_FILES["file"]["tmp_name"][$i])){
        
    
        $sql = "INSERT INTO image_product(id_product, image) VALUES ('$id_product','$file_url')";
        $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " . mysqli_error());
       } 
    
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>