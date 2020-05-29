<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Genero';
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
                    <li>Géneros</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <?php
				$query = "select * from genre";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				$t='name';
				while($arr=$res->fetch_assoc()){ 
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="generobusqueda.php?genre_id='.$arr['genre_id'].'">
												<img height="200px" width="200px" src="generos_img/'.$arr['genre'].'.jpg" alt="imagen género"/>
											</a>
											<h4>'.$arr['genre'].'</h4>
										</div>
										<div class="snipcart-details">
											<form action="generobusqueda.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="genre_id" value='.$arr['genre_id'].' />
													<input type="submit" name="submit" value="Ver canciones" class="button" />
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
        <!-- Mini Cart -->
        <?php include 'minicart.php'; ?>
        <!-- //Mini Cart -->

    </body>

    </html>