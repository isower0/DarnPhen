<?php
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>

   <?php
   
   $sql = "SELECT * FROM `image_product`";
$result = mysqli_query($conn,$sql);

$arr = [];

if (mysqli_num_rows($result)>0) {
    
    while($row = mysqli_fetch_assoc($result)){
    
      echo "<div id='img_div'>";
      echo "<img src='images/".$row['image']."' >";
    echo "</div>";
     
}

}
   
   ?>


</body>
</html>