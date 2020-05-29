<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Realizar pedido';
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
        <!-- breadcrumb -->
        <div class="products-breadcrumb">
            <div class="container">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Inicio</a><span>|</span></li>
                    <li>Pedido</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <?php
	$cid= $_SESSION['customer_id'];
	$currDate = date('Y-m-d');
	//echo $currDate; echo $emailID;
	$query = "INSERT into orders(track_id, order_id, date, original_price,discount,paid_price) values(?, ?, ?, ?, ?, ?)";
	$stmt=$mysqli->prepare($query);
	$stpl=$mysqli->prepare("INSERT into places(customer_id,order_id, track_id) values(?, ?, ?)");
	$query="select count(DISTINCT(order_id)) from orders";
	$t1=$mysqli->query($query);
	$a1=$t1->fetch_array();
	$oid=$a1[0]+1;
	$sql="Select * from cart where customer_id=$cid";
	$res=$mysqli->query($sql);	
	if($res->num_rows==0){
			echo "<h3 align = 'center'> No hay productos en el carrito </h3>"; 
			echo "<h3 align = 'center'><a href = pedidosanteriores.php>  Ver compras anteriores  </a></h3><br>";
			echo "<h3 align = 'center'><a href = logout.php>  Desconectarse  </a></h3>";		
	}
	else{
		while($row = $res->fetch_assoc()){
			$track_id=$row['track_id'];
			$amount=$row['amount'];
			$q1="select * from track where track_id=$track_id";
			$tr=$mysqli->query($q1);
			$arr=$tr->fetch_assoc();
			$amount=$row['amount'];
			$discount=(($mysqli->query("select count_discount($amount)"))->fetch_array())[0];
			$newprice=$amount-$discount;			
			$tp=$newprice;
			$name=$arr['name'];
			$stmt->bind_param("iisiii",$track_id,$oid,$currDate,$amount,$discount,$newprice);
			$stmt->execute();
			$stpl->bind_param("iii",$cid,$oid,$track_id);
			$stpl->execute();
			$sql="delete from cart where customer_id=$cid and track_id=$track_id";
			$mysqli->query($sql);		
		}	
			echo "<h3 align = 'center'> Se realizó el pedido </h3>"; 
			echo "<h3 align = 'center'><a href = pedidosanteriores.php>  Ver compras anteriores  </a></h3><br>";
			echo "<h3 align = 'center'><a href = logout.php>  Desconectarse  </a></h3>";
	}
	
?>
        <!-- Bootstrap Core JavaScript -->
        <?php include 'corejscript.php'; ?>
        <!-- //Bootstrap Core JavaScript -->
        <!-- Mini Cart -->
        <?php include 'minicart.php'; ?>
        <!-- //Mini Cart -->

    </body>

    </html>