<?php

    function consultaLogin($conexion, $email, $password){
        $consulta = "SELECT * FROM usuario WHERE `email` = '$email' AND `password` = '$password' AND `rol_usuario` = 1";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function crearSesion($usuario){
        //Queremos que el id de sesión sea su correo
        session_id($usuario['usuario']);
        //Creamos la conexion
        session_start();
        //Almacenamos en la sesión los datos del administrador
        foreach($usuario as $indice=>$valor){
            $_SESSION[$indice] = $valor;
        }
    }
?>