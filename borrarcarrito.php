<?php
// Iniciar sesión
session_start();
include 'config.php';
$track_id=$_GET['track_id'];
$cid=$_SESSION['customer_id'];
echo $track_id;
$sql="delete from cart where customer_id=$cid and track_id=$track_id";
if($track_id==-1){
	$sql="delete from cart where customer_id=$cid";
}
$mysqli->query($sql);
header("location: carrito.php");
?>	
