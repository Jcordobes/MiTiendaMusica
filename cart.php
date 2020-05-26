<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Cart';
include 'config.php';
if(!isset($_SESSION['loggedin'])){
	header("location: index.php");
} 
?>
<!DOCTYPE.php>
<html>
<!-- head -->
<?php include 'head.php'; ?>
<!-- //head -->	
<body>
<!-- header -->
<?php include 'header.php'; ?> 
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Inicio</a><span>|</span></li>
				<li>Carrito</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<H1 align="center"> Carrito </H1>
<div id="box1" >

		<table align="center", style="width:70%" class="table">
				<thead class="thead-dark">
				<tr>
					<th scope="col"> Lista </th>
					<th scope="col"> Canción </th>
					<th scope="col"> Precio original </th>
					<th scope="col"> Descuento </th>
					<th scope="col"> Total </th>
					<th scope="col"> Eliminar </th>
				</tr>
				</thead>
		<tbody>

<?php
	
	if(!isset($_SESSION['loggedin'])) header("location: login.php");
	$cid=$_SESSION['customer_id'];
	$sql="Select * from cart where customer_id=$cid";
	$res=$mysqli->query($sql);
	$cartTotal=0;
	$cnt=0;
	if($res->num_rows==0){
		echo '<tr><td colspan="10">No hay nada en su carrito</td></tr>';
	}
	else{
		while($row = $res->fetch_assoc()){
			$track_id=$row['track_id'];
			$amount=$row['amount'];
			$q1="select * from track where track_id=$track_id";
			$tr=$mysqli->query($q1);
			$arr=$tr->fetch_assoc();
			$cnt+=1;
			$amount=$row['amount'];
			$discount=(($mysqli->query("select count_discount($amount)"))->fetch_array())[0];
			$newprice=$amount-$discount;			
			$tp=$newprice;
			$cartTotal+=$tp;
			$name=$arr['name'];
			// echo $arr['price'];
				echo "<tr><td>{$cnt}</td><td>{$arr['name']}</td>  <td>{$amount} €</td> <td>{$discount} €</td> <td> {$newprice} €</td>
						<td><a href = delfcart.php?track_id=$track_id&cid=$cid>  eliminar  </a></td></tr>
				";			
		}
	}	
?>
</tbody></table>
</div>
<?php
	echo "<h3 align = 'center'> Su precio total son: ".$cartTotal." €</h3></br>";
	echo "<h3 align = 'center'><a href='OrderSummary.php?cid=$cid'><span class='label label-success'>Hacer el pedido</span></a> <a href='delfcart.php?cid=$cid&track_id=-1'><span class='label label-danger'>Eliminar Carrito</span></a> </h3></br></br>";

?>
<!-- <a href="#"><span class="label label-success">Success</span></a> -->
<!-- footer -->
 <?php include 'footer.php'; ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<?php include 'corejscript.php'; ?>
 <!-- //Bootstrap Core JavaScript -->
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>