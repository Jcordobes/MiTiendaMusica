<?php
/* Inserción de los credenciales */
$server='den1.mysql2.gear.host';
$username='tiendamusica';
$password='Re495JfD4!?M';
$database='tiendamusica';

/* Intento de conexión con mensaje de error en caso de fallo. */
$mysqli = mysqli_init();
if (!$mysqli) {
  die("mysqli_init failed");
}
$mysqli -> real_connect($server, $username, $password, $database);

?>