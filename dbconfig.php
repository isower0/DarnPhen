<?php
header("Access-Control-Allow-Origin: *"); 
/* header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  */

$host = 'localhost';
$username = 'isornhamali01';
$password = 'cAWTvGV8S23k7sa7';
$dbname = 'appmarket';

$conn = mysqli_connect($host, $username, $password, $dbname) or die('mysqli_connect failed');
mysqli_set_charset($conn,'utf8');
?>
