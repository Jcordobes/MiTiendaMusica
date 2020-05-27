<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
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
/* conexión local
$mysqli -> real_connect('localhost', 'root', '', 'tiendamusica'); */
?>