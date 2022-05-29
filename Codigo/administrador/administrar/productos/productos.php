<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    //Incluimos el conector a la Base de datos e iniciamos la sesión
    include("../../../database/conexion.php");
    session_start();


    
    //Esto impedirá que se acceda sin iniciar sesión y si el usuario logueado no tiene el rol de Admin volverá al login
    if (!isset($_SESSION['rol_usuario'])){
        
        echo "<script>window.open('../../sesion/login.php','_self')</script>";
        
    }else{
?>

<?php include "../../includes/header.php"; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Productos</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a href="insertarProductos.php" style="color: white; text-decoration:none;" class="btn btn-primary"><i class="fas fa-plus-circle"></i> INSERTAR PRODUCTO</a>
            </div>
        </div>
        <br>
        <div id="tablaProductos"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaProductos').load("tablaProductos.php");
    });
</script>

<?php } ?>