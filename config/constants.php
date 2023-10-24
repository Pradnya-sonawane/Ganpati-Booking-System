<?php

session_start();

define('SITEURL','http://localhost/ganpati-order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','My@21prad');
define('BD_NAME','ganpati-order');
$conn = mysqli_connect('localhost', 'root', 'My@21prad') or die(mysqli_connect_error());
$db_select=mysqli_select_db($conn, 'ganpati-order') or die(mysqli_connect_error());
 

?>