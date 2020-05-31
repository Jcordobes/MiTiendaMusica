<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Descripción de la canción';
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
                    <li>Canción</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <div align="center">
            <h1>Detalles de la canción</h1>
            <?php
	 			$track_id=$_GET['track_id'];
				$query = "select * from track where track_id=$track_id";
				$res=$mysqli->query($query);
				$t='name';
				echo '<div class="row">';
				while($arr=$res->fetch_assoc()){ 
				$cnt=$arr['track_id']%125;
				$cnt+=1;
				$price=$arr['price'];
				$discount=(($mysqli->query("select count_discount($price)"))->fetch_array())[0];
				$newprice=$price-$discount;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="cancdesc.php?track_id='.$arr['track_id'].'">
												<img height="200px" width="200px" src="canciones_img/'.$cnt.'.jpg" alt="imagen canción"/>
											</a>
											<p style="width: 190px">'.$arr['name'].'</p>
											<h4>'.$newprice.' €<span>'.$price.'</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="añadircarrito.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="track_id" value='.$arr['track_id'].' />
													<input type="hidden" name="amount" value='.$arr['price'].' />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Añadir al carrito" class="button" />
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
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"> Canción </th>
                            <th scope="col"> Artista </th>
                            <th scope="col"> Álbum </th>
                            <th scope="col"> Género </th>
                            <th scope="col"> Fecha de lanzamiento </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
			$total=0;
			$track_id=$_GET['track_id'];
			$arr=($mysqli->query("select * from track where track_id=$track_id"))->fetch_assoc();
			$track=$arr['name'];
			$date=$arr['release_date'];
			$artist_id=(($mysqli->query("select artist_id from makes where track_id=$track_id"))->fetch_assoc())['artist_id'];
			$arr=($mysqli->query("select * from artist where artist_id=(select artist_id from makes where track_id=$track_id)"))->fetch_assoc();
			$name=$arr['first_name']." ".$arr['last_name'];
			$arr=($mysqli->query("select * from album where album_id=(select album_id from compose where track_id=$track_id)"))->fetch_assoc();
			$album=$arr['name'];
			$album_id=$arr['album_id'];
			$arr=($mysqli->query("select * from genre where genre_id=(select genre_id from categorisedby where track_id=$track_id)"))->fetch_assoc();
			$genre=$arr['genre'];
			$genre_id=$arr['genre_id'];
					echo "<br>";
					echo "<tr><td>{$track}</td> <td><a href='artistdesc.php?artist_id=$artist_id'>{$name}</a></td>
							<td><a href='albumdesc.php?album_id=$album_id'> {$album} </a>	</td><td><a href='generobusqueda.php?genre_id=$genre_id'>{$genre}</a></td><td>{$date}</td></tr>
					";
		
		?>
                    </tbody>
                </table>
            </div>
        </div>
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

    </body>

    </html>