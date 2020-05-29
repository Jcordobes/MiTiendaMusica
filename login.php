<?php
// Iniciar sesión
$GLOBALS['currpage']='Iniciar sesión';
include 'config.php';
$username = $password = "";
$username_err = $password_err = "";
session_start();
if(isset($_SESSION['loggedin'])){
	header("location: index.php");
} 
// Procesa los datos cuando el formulario es enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Comprueba si el usuario está vacio
    if(empty(trim($_POST["username"]))){
        $username_err = 'Por favor, inserte su usuario.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Comprueba si la contraseña está vacia
    if(empty(trim($_POST['password']))){
        $password_err = 'Por favor, inserte su contraseña.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Valida los datos
    if(empty($username_err) && empty($password_err)){
        // Preparara el select
        $sql = "SELECT username, password, customer_id FROM customer WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            
            // Ajusta los parametros
            $param_username = $username;
            
            // Ejecuta las sentencias
            if($stmt->execute()){
                $stmt->store_result();
                
                // Comprueba si el usuario existe, en caso de ser así comienza a verificar la contraseña
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($username, $hashed_password, $cid);
                    if($stmt->fetch()){
                        if($password==$hashed_password){
                            // Si la contraseña es correcta, inicia una sesión
                            session_start();
                            $_SESSION['username'] = $username; 
                            $_SESSION['loggedin'] = TRUE;    
                            $_SESSION['customer_id']= $cid; 
                            header("location: bienvenida.php");
                        } else{
                            // Muestra un error si la contraseña no es valida
                            $password_err = 'La contraseña introducida no es valida.';
                        }
                    }
                } else{
                    // Muestra un error si el usuario no existe
                    $username_err = 'No se ha encontrado una cuenta con ese usuario.';
                }
            } else{
                // Muestra un error si hay algún problema desconocido.
                echo "Hubo un error, intentelo más tarde.";
            }
        }
        $stmt->close();
    }
    // Cierra conexión
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
                    <li>Inicio de Sesión</li>
                </ul>
            </div>
        </div>
        <!-- //breadcrumb -->
        <!-- banner -->
        <?php include 'leftsticky.php'; ?>
        <!-- content -->
        <div class="wrapper">
            <h2>Inicio de Sesión</h2>
            <p>Por favor, introduzca sus datos para iniciar sesión.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Usuario:<sup>*</sup></label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña:<sup>*</sup></label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                </div>
                <p>¿No dispone de una cuenta? <a href="registro.php">Registrarse</a>.</p>
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