<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '213.194.157.200');
define('DB_USERNAME', 'tiendamusica');
define('DB_PASSWORD', 'Re495JfD4!?M');
define('DB_DATABASE', 'tiendamusica');
 
$server='den1.mysql2.gear.host';
$username='tiendamusica';
$password='Re495JfD4!?M';
$database='tiendamusica';
/* Attempt to connect to MySQL database */

$mysqli = mysqli_init();
if (!$mysqli) {
  die("mysqli_init failed");
}

$mysqli -> real_connect($server, $username, $password, $database);
?>