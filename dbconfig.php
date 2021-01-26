<?php
header("Access-Control-Allow-Origin: *"); 
/* header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  */

/* $host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'appmarket'; 
 */
$host = 'localhost';
$username = 'id15917053_isornhamali01';
$password = 'J#eepza12218';
$dbname = 'id15917053_appmarket'; 



$conn = mysqli_connect($host, $username, $password, $dbname) or die('mysqli_connect failed');
mysqli_set_charset($conn,'utf8');
?>
