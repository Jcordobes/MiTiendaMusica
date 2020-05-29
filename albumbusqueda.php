<?php
// Iniciar sesion
session_start();
$GLOBALS['currpage']='Resultados de busqueda de álbumes';
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
                    <li>Lista de álbumes</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <div class="w3l_search" style="float:right">
            <form action="albumbusqueda.php" method="post">
                <input type="text" name="searchstr" value="Buscar un álbum..." onfocus="this.value = '';"
                    onblur="if (this.value == '') {this.value = 'Buscar un álbum...';}" required="">
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
				echo "<h2>Lista de álbumes</h2>";

				$query = "select * from album where name like '%$search%'";
				$res=$mysqli->query($query);
				echo '<div class="row">';
				$cnt=0;
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
												<img height="200px" width="200px" src="albumes_img/'.$cnt.'.jpg" alt="imagen álbum"/>
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