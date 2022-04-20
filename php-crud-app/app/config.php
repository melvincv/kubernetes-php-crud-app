<?php
/* Database credentials. */
define('DB_SERVER', 'mysqldb');
define('DB_USERNAME', 'melvincv');
define('DB_PASSWORD', 'ksefjpjixN@TiZ59');
define('DB_NAME', 'crudapi');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>