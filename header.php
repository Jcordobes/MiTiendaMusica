<!DOCTYPE.php>
<html>
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="index.php">Music Origins Store</a>
		</div>
		<div class="w3l_search">
			<form action="busqueda.php" method="post">
				<input type="text" name="searchstr" value="Buscar..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<form action="carrito.php" method="post" class="last">
				<fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="Tu carrito " class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">

							<ul class="dropdown-menu drp-mnu">
							<?php 
							if(isset($_SESSION["username"])){
							echo "<li><a href='pedidosanteriores.php'>Historial de Compras</a></li>";
							echo "<li><a href='logout.php'>Desconectarse</a></li>"; 
							
							}
							else{
								echo '<li><a href="login.php">Iniciar Sesión</a></li> 
								<li><a href="registro.php">Registrarse</a></li>';
							}
							?>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script para sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script para sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="busqueda.php">Productos</a><i>/</i></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+91)95669996</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">contacto@mail.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</html>