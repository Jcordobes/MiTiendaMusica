<?php
// Iniciar sesión
$GLOBALS['currpage']='Registrarse';
include 'config.php';
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, introduzca un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT customer_id FROM customer WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "El usuario ya existe.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Hubo un error, intentelo más tarde.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Por favor, introduzca su contraseña.";     
    } 
    else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Por favor, confirme su contraseña.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Las contraseñas no coinciden.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO customer (customer_id,first_name,last_name,mobile_number,email_id,address,username, password,gender,age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $nulls = null;
        $res= $mysqli->query("select count(1) from customer");
        $nrow= $res->fetch_row();
        $uid = $nrow[0]+1;
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("issssssssi",$uid,$_POST['first_name'],$_POST['last_name'],$_POST['mobile_number'],$_POST['email_id'],$nulls,$param_username, $param_password,$nulls,$nulls);
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Hubo un error, intentelo más tarde.";
            }
        }
         
        // Close statement
       // $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
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
				<li>Registro</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor, rellene este formulario para completar su registro</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirme su contraseña:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="first_name" class="form-control">
            </div>            
             <div class="form-group">
                <label>Apellidos:</label>
                <input type="text" name="last_name" class="form-control">
            </div> 
            <div class="form-group">
                <label>Teléfono:</label>
                <input type="text" name="mobile_number" class="form-control">
            </div> 
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email_id" class="form-control">
            </div>            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-default" value="Reiniciar">
            </div>
            <p>¿Ya tiene una cuenta? <a href="login.php">Inicia Sesión</a>.</p>
        </form>
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