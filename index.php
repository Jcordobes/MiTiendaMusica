<?php
//  Iniciar sesión
session_start();
$GLOBALS['currpage']='Inicio';
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

                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3> <span>Eminem: Revival</span> </h3>
                            <div class="more">
                                <a href="albumdesc.php?album_id=4"
                                    class="button--saqui button--round-l button--text-thick" data-text="Ir al disco">Ir
                                    al disco</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3> <span>Kamelot</span> </h3>
                            <div class="more">
                                <a href="artistdesc.php?artist_id=3"
                                    class="button--saqui button--round-l button--text-thick"
                                    data-text="Ir a la banda">Ir a la banda</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>El mejor <i>metal</i> </h3>
                            <div class="more">
                                <a href="generobusqueda.php?genre_id=2"
                                    class="button--saqui button--round-l button--text-thick"
                                    data-text="Ver canciones">Ver canciones</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- flexSlider -->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
        </script>
        <!-- //flexSlider -->
        </div>
        <div class="clearfix"></div>
        </div>
        <!-- banner -->
        <!-- top-brands -->
        <div class="top-brands">
            <div class="container">
                <h3>Artistas destacados</h3>
                <?php
				$query = "select * from artist order by rating DESC limit 4";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				while($arr=$res->fetch_assoc()){ 
				$cnt=$arr['artist_id'] % 250;
				$cnt+=1;
				echo'<div class="col-12 col-xs-3 col-sm-3 mb-3 m-0 !important">
					<div class="hover14">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="artistdesc.php?artist_id='.$arr['artist_id'].'">
												<img height="200px" width="200px" src="artistas_img/'.$cnt.'.jpg" alt="imagen artista"/>
											</a>
											<h4>'.$arr['first_name'].' '.$arr['last_name'].'</h4>

										</div>
										<div class="snipcart-details">
											<form action="añadircarrito.php" method="post">
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
						
				}

				echo '</div>';
				?>
            </div>
        </div>
        <!-- //top-brands -->
        <!-- fresh-tracks -->
        <div class="fresh-tracks">
            <div class="container">
                <h3>Novedades</h3>
                <?php
				$query = "select * from track order by release_date ASC limit 14,4";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				$t='name';
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
											<h4>'.$newprice.'<span>'.$price.' €</span></h4>
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
				
				echo '</div>'
				?>
            </div>
        </div>
        <!-- //fresh-tracks -->
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