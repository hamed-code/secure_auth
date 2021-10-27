<?php

define('DB_NAME', 'auth_sec');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

// if(!$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)){
//     die("Failed to Connect!!");
// }

$string = "mysql:host=localhost;dbname=auth_sec";
if(!$connection = new PDO($string,DB_USER,DB_PASS)){
    die("Failed to connect!");
}