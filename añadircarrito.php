<?php
// Iniciar sesión
session_start();
include 'config.php';
$track_id=$_POST['track_id'];
$cid=$_SESSION['customer_id'];
$price=$_POST['amount'];
$sql="select amount from cart where customer_id=$cid and track_id=$track_id";
$res=$mysqli->query($sql);
if($res->num_rows==0){
	$sql="insert into cart(customer_id,track_id,amount) values (?,?,?)";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("iii",$cid,$track_id,$price);
	$stmt->execute();
	header("location: carrito.php");
}
?>	
