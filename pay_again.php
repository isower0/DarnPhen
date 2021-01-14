<?php
include 'dbconfig.php';




$id_order = $_POST['id_order'];
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

/* $order_date//time stamp */
/* date_default_timezone_set("Asia/Bangkok");
$current_timestamp = time();
$order_date = date("Y-m-d H:i:s",$current_timestamp); */


$sql_orders = "INSERT INTO `orders`(`id_user`, `name_customer`, `phone_customer`, `address_customer`,
`total_price`, `deliviery_price`,`delivery_long`,`delivery_lat`)
VALUES ($id_user,'$name_customer','$phone_customer'
,'$address_customer',$total_price,$deliviery_price,
$delivery_long,$delivery_lat)";

$result_orders = mysqli_query($conn,$sql_orders);

 /* if ( $result_orders ) {
    echo json_encode(true); 
    }else{
        echo json_encode(false);  
}  */

$sql_last_id = "SELECT MAX(`id_order`) AS maxid FROM `orders`";
$res = mysqli_query($conn,$sql_last_id); // ทำคำสั่ง
$ret = mysqli_fetch_assoc($res); // อ่านค่า
$last_id = intval($ret['maxid']); 

/* echo $last_id;  */
echo json_encode($last_id,JSON_UNESCAPED_UNICODE); 
// คืนค่า id ที่ insert สูงสุด

$sql_select = "SELECT * FROM `view_order` WHERE `id_order` = $id_order "; //เปลี่ยนไปดูใน order แทน
$result = mysqli_query($conn,$sql_select);
 
 $arr = array();

    while($row = mysqli_fetch_assoc($result)){
    
        $arr[] = $row;    
     }
     while(mysqli_next_result($conn)){;}
     /* print_r($arr); */  
  /*  $data = json_encode($arr,JSON_UNESCAPED_UNICODE); */

    /*  echo $data; */
/* foreach ($arr as $key => $val) {
    echo $arr[$key]['id_product'];
} */
// Build the SQL string
$sql = '';
foreach($arr as $key => $val) {
    if($sql != '') $sql.= ',';
    $sql .= '('. $last_id .',"'.$arr[$key]['id_product'] .'", '.  $arr[$key]['quantity'] .', '.  $arr[$key]['price_each'] .',"'.$arr[$key]['description_order'] .'")';    
}
if($sql != '') {
    $sql = "INSERT INTO `orderdetail`(`id_order`, `id_product`, `quantity`, `price_each`,`description_order`) VALUES". $sql;
}
/* echo $sql; */
$result_order_detail = mysqli_query($conn,$sql);  
/* while(mysqli_next_result($conn)){;} */
/* if(!$result_order_detail){
    echo 'error'. mysqli_error($conn);

} */

$sql_payment = "INSERT INTO `payment`(`id_order`, `paymant_cost`, `status`) VALUES ($last_id,$paymant_cost,1)";
$result_payment =  mysqli_query($conn,$sql_payment);  
//status = 1 คือ

/* $sql_delete = '';
foreach($arr as $key => $val) {
    if($sql_delete != '') $sql_delete.= ' AND `id_cart` =';
    $sql_delete .= $arr[$key]['id_cart'];
}
if($sql_delete != '') {
    $sql_delete = "DELETE FROM `cart` WHERE `id_cart` =". $sql_delete;
} */




 


mysqli_close($conn);








?>