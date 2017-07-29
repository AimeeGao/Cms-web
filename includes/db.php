<?php 
// 连接数据库
// $host = 'localhost';
// $user_name = 'root';
// $password = 1346;
// $conn = mysqli_connect($host,$user_name,$password,$db_name);
// $db_name = 'cms';
// if($conn){
// 	echo "We are connected";
// }

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 1346;
$db['db_name'] = 'cms'; // 连接到指定的数据库

foreach ($db as $key => $value){
	define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// if($connection){
// 	echo "We are connected";
// }
?>