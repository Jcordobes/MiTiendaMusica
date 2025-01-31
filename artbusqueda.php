<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Busqueda de artistas';
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
                    <li>Lista de artistas</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <div class="w3l_search" style="float:right">
            <form action="artbusqueda.php" method="post">
                <input type="text" name="searchstr" value="Buscar un artista..." onfocus="this.value = '';"
                    onblur="if (this.value == '') {this.value = 'Buscar un artista...';}" required="">
                <input type="submit" value=" ">
            </form>
        </div>
        <br> <br>
        <?php
				if(isset($_POST['searchstr']))
				$search = $_POST['searchstr'];
				else if(isset($_GET['searchstr']))
				$search=$_GET['searchstr'];
				else
				$search="";
				if($search!='')
				echo "<h2>Mostrando resultados para: '". $search . "'</h2>";
				else
				echo "<h2>Lista de artistas</h2>";

				$query = "select * from artist where concat(first_name,' ',last_name) like '%$search%' limit 1000";
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