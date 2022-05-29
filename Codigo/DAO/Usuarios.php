<?php

    
    function mostrarUsuariosPorID($conexion, $idUsuario){
        $consulta = "SELECT * FROM `usuario` WHERE id = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }


    function ModificarUsuario($conexion, $idUsuario, $usuario, $password, $nombre, $apellido1, $apellido2, $email,$estado, $telefono, $codigoP, $direccion, $dni){
        $consulta = "UPDATE `usuario` SET `user` = '$usuario', `password` = '$password', 
        `nombre` = '$nombre',`apellido1` = '$apellido1', `apellido2` = '$apellido2',
         `email` = '$email',`usuario_verificado` = '$estado', `telefono` = '$telefono', `codigoPostal` = '$codigoP', `direccion` = '$direccion', `dni` = '$dni' WHERE `id` = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    


?>