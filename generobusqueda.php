<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Resultados de búsqueda';
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
                    <li>Busqueda de géneros</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <?php
				if(isset($_POST['genre_id']))
				$genre_id = $_POST['genre_id'];
				else if(isset($_GET['genre_id']))
				$genre_id=$_GET['genre_id'];
				else
				$genre_id="";
				$genre=(($mysqli->query("select * from genre where genre_id=$genre_id"))->fetch_assoc())['genre'];
				if($genre_id!='')
				echo "<h2>Mostrando canciones del género '". $genre. "'</h2>";
				else
				echo "<h2>Busqueda incorrecta</h2>";
				$res=$mysqli->query("select track_id from categorisedby where genre_id=$genre_id");
				echo '<div class="row">';
				while($tem=$res->fetch_assoc()){ 
				//echo $arr['name'];
				$track_id=$tem['track_id'];
				$arr=($mysqli->query("select * from track where track_id=$track_id"))->fetch_assoc();	
				$cnt=$arr['track_id']%125;
				$cnt+=1;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="cancdesc.php?track_id='.$arr['track_id'].'">
												<img height="200px" width="200px" src="canciones_img/'.$cnt.'.jpg" alt="imagen género"/>
											</a>
											<p style="width: 190px">'.$arr['name'].'</p>
											<h4>'.$arr['price'].' €</h4>
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
						
				}
				
				echo '</div>';
				?>
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