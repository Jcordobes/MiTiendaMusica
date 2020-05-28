<?php
// Iniciar sesión
session_start();
include 'config.php';
$type=$_GET['type'];
$track_id=$_GET['track_id'];
$cid=$_SESSION['customer_id'];
$sql="select amount from cart where customer_id=$cid and track_id=$track_id";
$res=$mysqli->query($sql);
$res=$res->fetch_assoc();
$q=$res['amount'];
if($type==1){
	if($q==1){
		header("location: delete.php?track_id=$track_id&cid=$cid");		
	}
	else{
		$q-=1;
		$sql="update cart set amount=$q where customer_id=$cid and track_id=$track_id";
		$mysqli->query($sql);
		header("location: carrito.php");
	}
}
else{
	$q+=1;
	$sql="update cart set amount=$q where customer_id=$cid and track_id=$track_id";
	$mysqli->query($sql);
	header("location: carrito.php");	
}
?>	
