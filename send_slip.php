<?php
  
include 'dbconfig.php';
include 'uplloadconfig.php';

$storage = new storage();



$id_order = $_POST['id_order'];
$folderPath = "images/";
$file_names = $_FILES["file"]["name"];
$targetFilePath = $folderPath . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

date_default_timezone_set("Asia/Bangkok");
$current_timestamp = time();
$pay_date = date("Y-m-d H:i:s",$current_timestamp);
//$pay_date//time stamp 
 
for ($i = 0; $i < count($file_names); $i++) {
    $file_name=$file_names[$i];
    $extension = end(explode(".", $file_name));
    $original_file_name = pathinfo($file_name, PATHINFO_FILENAME);
    $file_url = $original_file_name . "." . $extension;
    
  

    if($storage->uploadObject('images-market',$file_url,$_FILES["file"]["tmp_name"][$i])){
        
        /* $sql = "UPDATE `testimg` SET `img`= '$file_name',`date`='$pay_date' WHERE `id` =1"; */
        $sql = "UPDATE `payment` SET `image_slip`='$file_name',`datetime_payment`='$pay_date',`status`= 2 WHERE `id_order` = $id_order";
        $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " . mysqli_error());
       } 
    

    }


?>