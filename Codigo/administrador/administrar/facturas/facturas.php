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
        <h1 class="display-4">Facturas</h1>
        <hr>
        <br>
        <div id="tablaFacturas"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaFacturas').load("tablaFacturas.php");
    });
</script>

<?php } ?>