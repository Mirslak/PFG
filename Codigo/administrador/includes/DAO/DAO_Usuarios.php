<?php

    function consultaLogin($conexion, $usuario, $password){
        $consulta = "SELECT * FROM `usuarios` WHERE `usuario` = '$usuario' AND `password` = '$password'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }


    function crearSesion($usuario){
        //Queremos que el id de sesión sea su usuario
        session_id($usuario['usuario']);
        //Creamos la conexion
        session_start();
        //Almacenamos en la sesión los datos del usuario
        foreach($usuario as $indice=>$valor){
            $_SESSION[$indice] = $valor;
        }
    }

    function mostrarUsuariosPorID($conexion, $idUsuario){
        $consulta = "SELECT * FROM `usuario` WHERE id = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function mostrarUsuariosActivos($conexion){
        $consulta = "SELECT * FROM `usuario` WHERE `usuario_verificado` = 1";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarUsuariosInactivos($conexion){
        $consulta = "SELECT * FROM `usuario` WHERE `usuario_verificado` = 0";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarUsuarios($conexion){
        $consulta = "SELECT * FROM `usuario`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarProductos($conexion){
        $consulta = "SELECT * FROM `producto`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarFacturas($conexion){
        $consulta = "SELECT * FROM `factura`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function ModificarUsuario($conexion, $idUsuario, $usuario, $password, $nombre, $apellido1, $apellido2, $email,$estado, $telefono, $codigoP, $direccion, $dni, $rol){
        $consulta = "UPDATE `usuario` SET `user` = '$usuario', `password` = '$password', 
        `nombre` = '$nombre',`apellido1` = '$apellido1', `apellido2` = '$apellido2',
         `email` = '$email',`usuario_verificado` = '$estado', `telefono` = '$telefono', `codigoPostal` = '$codigoP', `direccion` = '$direccion', `dni` = '$dni', `rol_usuario` = '$rol' WHERE `id` = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    

    function eliminarUsuario($conexion, $idUsuario){
        $consulta = "DELETE FROM `usuario` WHERE `id` = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function insertarUsuario($conexion, $user, $password, $nombre, $apellido1, $apellido2, $email, $telefono, $dni, $direccion, $Cpostal, $estado,$rol_usuario){
        $consulta = "INSERT into usuario (user, password, nombre, apellido1, apellido2, email, telefono,dni, direccion,CodigoPostal,usuario_verificado,rol_usuario,token) VALUES ('$user','$password','$nombre','$apellido1','$apellido2','$email','$telefono','$dni','$direccion','$Cpostal','$estado','$rol_usuario')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    
    function buscarEmailRepetido($conexion, $email){
        $consulta = "SELECT * FROM usuario WHERE (`email` = '$email')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    

?>
