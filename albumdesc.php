<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Descripción de álbum';
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
<!-- breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Inicio</a><span>|</span></li>
				<li>Álbum</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
	<div align="center">
		<h1>Detalles del Álbum</h1>
			<?php
				$album_id=$_GET['album_id'];
				$query = "select * from album where album_id=$album_id";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				while($arr=$res->fetch_assoc()){ 
				$cnt=$arr['album_id']%60;
				$cnt+=1;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="albumdesc.php?album_id='.$arr['album_id'].'">
												<img height="200px" width="200px" src="albumes_img/'.$cnt.'.jpg"/>
											</a>
											<h4>'.$arr['name'].'</h4>
										</div>
										<div class="snipcart-details">
											<form action="añadircarrito.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="album_id" value='.$arr['album_id'].' />
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
					<th scope="col"> Número de canciones </th>
					<th scope="col"> Fecha de lanzamiento </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$total=0;
			$album_id=$_GET['album_id'];
			$arr=($mysqli->query("select * from album where album_id=$album_id"))->fetch_assoc();
			$name=$arr['name'];
					echo "<br>";
					echo "<tr><td>{$name}</td> <td>{$arr['number_of_songs']}</td>
							<td> {$arr['release_date']} </td></tr>
					";
		
		?>
		</tbody>
		</table>
			</div>
			</div>

		<table width="30%" class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col"> Número de la canción </th>
					<th scope="col"> Canción</th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cnt=1;
			$album_id=$_GET['album_id'];
			$res=$mysqli->query("select * from compose where album_id=$album_id");
			while($arr=$res->fetch_assoc()){
				$track_id=$arr['track_id'];
				$t1=($mysqli->query("select * from track where track_id=$track_id"))->fetch_assoc();
					echo "<br>";
					echo "<tr><td>{$cnt}</td> <td><a href='cancdesc.php?track_id=$track_id'>{$t1['name']}</a></td></tr>
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