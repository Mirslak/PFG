<?php
    //Incluimos el conector a la Base de datos e iniciamos la sesión
    include("../../../includes/Database.php");
    session_start();
    
    //Esto impedirá que se acceda sin iniciar sesión y si el usuario logueado no tiene el rol de Admin volverá al login
    if (!isset($_SESSION['rol_usuario'])){
        
        echo "<script>window.open('../../sesion/login.php','_self')</script>";
        
    }else{
?>

<?php include "../../includes/header.php"; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Usuarios Inactivos</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a href="insertarUsuario.php" style="color: white; text-decoration:none;" class="btn btn-primary"><i class="fas fa-plus-circle"></i> INSERTAR USUARIO</a>
            </div>
        </div>
        <br>
        <div id="tablaUsuariosInactivos"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaUsuariosInactivos').load("tablaUsuariosInactivos.php");
    });
</script>

<?php } ?>