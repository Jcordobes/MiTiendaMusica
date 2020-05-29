<?php
// Iniciar sesión
session_start();
 
// Quita todas las variables de sesión
$_SESSION = array();
 
// Cierra la sesión
session_destroy();
 
// Redirige a la sección de login
header("location: login.php");
exit;
?>