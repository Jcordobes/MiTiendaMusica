<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Artist Description';
include 'config.php';
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
				<li>Detalles Artista</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
	<div align="center">
		<h1>Detalles del artista</h1>
			<?php
				$artist_id=$_GET['artist_id'];
				$query = "select * from artist where artist_id=$artist_id";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				while($arr=$res->fetch_assoc()){ 
				//echo $arr['name'];
				$cnt=$arr['artist_id'] % 250;
				$cnt+=1;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="artistdesc.php?artist_id='.$arr['artist_id'].'">
												<img height="200px" width="200px" src="artist_images/'.$cnt.'.jpg"/>
											</a>
											<h4>'.$arr['first_name'].' '.$arr['last_name'].'</h4>

										</div>
										<div class="snipcart-details">
											<form action="addtocart.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="artist_id" value='.$arr['artist_id'].' />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
						</div>';
						
				} ?>	
		<div class="col-12 col-md-9">
			<table width="30%" class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col"> Nombre </th>
						<th scope="col"> Género </th>
						<th scope="col"> Edad </th>
						<th scope="col"> Ciudad Natal </th>
					</tr>
				</thead>
			<tbody>
			<?php
				$total=0;
				//$cid = $_SESSION['customer_id'];
				$artist_id=$_GET['artist_id'];
				$arr=($mysqli->query("select * from artist where artist_id=$artist_id"))->fetch_assoc();
				$name=$arr['first_name']." ".$arr['last_name'];
				$hometown=$arr['home_city'];
						echo "<br>";
						echo "<tr><td>{$name}</td> <td>{$arr['gender']}</td>
								<td> {$arr['age']} </td><td>{$hometown}</td></tr>
						";
			?>
			</tbody>
			</table>
		</div>
		<?php 
			echo '</div>'; # end row
		?>
		<table width="30%" class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col"> Número canción </th>
					<th scope="col"> Canción</th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cnt=1;
			//$cid = $_SESSION['customer_id'];
			$artist_id=$_GET['artist_id'];
			$res=$mysqli->query("select * from makes where artist_id=$artist_id");
			while($arr=$res->fetch_assoc()){
				$track_id=$arr['track_id'];
				$t1=($mysqli->query("select * from track where track_id=$track_id"))->fetch_assoc();
					echo "<br>";
					echo "<tr><td>{$cnt}</td> <td><a href='trackdesc.php?track_id=$track_id'>{$t1['name']}</a></td></tr>
					";
					$cnt+=1;
			}
		
		?>
		</tbody>
		</table>		
	</div>
<!-- //content -->
<?php include 'bannerend.php'; ?>
<!-- //banner -->
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