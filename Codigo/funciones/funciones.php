<?php
function consulta_usuario($conexion, $usuario, $password){

    $consulta = "SELECT * FROM `usuario` WHERE `user` = '$usuario' AND `password` = '$password' AND `usuario_verificado` = 1";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}

function consulta_correo($conexion, $email){

    $consulta = "SELECT `password` FROM `usuario` WHERE `email` = '$email'";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}

function crearSesion($usuario){
    //Queremos que el id de sesión sea su usuario
    session_id($usuario['user']);
    //Creamos la conexion
    session_start();
    //Almacenamos en la sesión los datos del usuario
    foreach($usuario as $indice=>$valor){
        $_SESSION[$indice] = $valor;
    }
}


function comprobarRegsitro(){
    echo"<srcipt>alert('Funciono')</script>";
    
    if(!isset($_SESSION['user'])){ 
        
        echo"<srcipt>alert('¡ATENCIÓN! Debe estar logeado para añadir cosas a su carrito.')</script>";

    }else{
        echo"<script>window.open('carrito.php','_self')</script>";
    }
}


function mostrarProductos($conexion){
    $consulta = "SELECT * FROM `producto`";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}


function mostrarProductosPorID($conexion, $idProducto){
    $consulta = "SELECT * FROM `producto` WHERE id_producto=$idProducto ";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}

function mostrarCategoriasPorID($conexion, $idCategoria){
    $consulta = "SELECT * FROM `categoria` WHERE id_categoria=$idCategoria ";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}

function mostrarProductosPorMarca($conexion, $marca){
    $consulta = "SELECT * FROM `producto` WHERE marca='$marca' ";
 
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}


function buscarEmailRepetido($conexion, $email){
    $consulta = "SELECT * FROM usuario WHERE (`email` = '$email')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function buscarUserRepetido($conexion, $usuario){
    $consulta = "SELECT * FROM usuario WHERE (`user` = '$usuario')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}


?>
