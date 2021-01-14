<?php
include 'dbconfig.php';

$id_user = $_POST['id_user'];
$name_customer = $_POST['name_customer'];
$phone_customer = $_POST['phone_customer'];
$address_customer = $_POST['address_customer'];
$total_price = $_POST['total_price'];
$deliviery_price = $_POST['deliviery_price'];
$delivery_long = $_POST['delivery_long'];
$delivery_lat = $_POST['delivery_lat'];
$name_market = $_POST['name_market'];
$paymant_cost = $_POST['paymant_cost'];



$sql_orders = "INSERT INTO `orders`(`id_user`, `name_customer`, `phone_customer`, `address_customer`,
`total_price`, `deliviery_price`,`delivery_long`,`delivery_lat`)
VALUES ($id_user,'$name_customer','$phone_customer'
,'$address_customer',$total_price,$deliviery_price,
$delivery_long,$delivery_lat)";

$result_orders = mysqli_query($conn,$sql_orders);

 

$sql_last_id = "SELECT MAX(`id_order`) AS maxid FROM `orders`";
$res = mysqli_query($conn,$sql_last_id); // ทำคำสั่ง
$ret = mysqli_fetch_assoc($res); // อ่านค่า
$last_id = intval($ret['maxid']); 

/* echo $last_id;  */
echo json_encode($last_id,JSON_UNESCAPED_UNICODE); 
// คืนค่า id ที่ insert สูงสุด

$sql_select = "CALL view_cart_group($id_user ,'$name_market')";
$result = mysqli_query($conn,$sql_select);
 
 $arr = array();

    while($row = mysqli_fetch_assoc($result)){
    
        $arr[] = $row;    
     }
     while(mysqli_next_result($conn)){;}
     /* print_r($arr); */  
  


// Build the SQL string
$sql = '';
foreach($arr as $key => $val) {
    if($sql != '') $sql.= ',';
    $sql .= '('. $last_id .',"'.$arr[$key]['id_product'] .'", '.  $arr[$key]['qty'] .', '.  $arr[$key]['price'] .',"'.$arr[$key]['description_order'] .'")';    
}
if($sql != '') {
    $sql = "INSERT INTO `orderdetail`(`id_order`, `id_product`, `quantity`, `price_each`,`description_order`) VALUES". $sql;
}
/* echo $sql; */
$result_order_detail = mysqli_query($conn,$sql);  


$sql_payment = "INSERT INTO `payment`(`id_order`, `paymant_cost`, `status`) VALUES ($last_id,$paymant_cost,1)";
$result_payment =  mysqli_query($conn,$sql_payment);  
//status = 1 คือ

foreach($arr as $key => $val) {
    $sql_delete = "DELETE FROM `cart` WHERE `id_cart` =". $arr[$key]['id_cart'];
   // echo $sql_delete; 
    $result_delete = mysqli_query($conn,$sql_delete);
}




 


mysqli_close($conn);








?>