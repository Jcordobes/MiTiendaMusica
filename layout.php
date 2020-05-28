<?php
// Iniciar sesión
session_start();
$GLOBALS['currpage']='Layout';
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
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Page Name Here!</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
		<div class="content">
			<div class="content1">
				<h3>Insert Stuff Here!</h3>
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
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>