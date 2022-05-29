<?php
    function mostrarProductosPorID($conexion, $idProducto){
        $consulta = "SELECT * FROM `producto` WHERE id_producto = '$idProducto'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarProductos($conexion){
            $consulta = "SELECT * FROM `producto`";
            $resultado = mysqli_query($conexion, $consulta);
            return $resultado;
    }

    function ModificarProducto($conexion, $idProducto, $Nombre, $Precio, $Marca, $Descripcion ,$foto){
        $consulta = "UPDATE `producto` SET `nombre` = '$Nombre', `precio` = '$Precio', 
        `marca` = '$Marca', `descripcion` = '$Descripcion', `foto` = '$foto'
         WHERE `id_producto` = '$idProducto'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function eliminarProducto($conexion, $idProducto){
        $consulta = "DELETE FROM `producto` WHERE `id_producto` = '$idProducto'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function insertarProducto($conexion, $Nombre, $Precio, $Marca, $Descripcion,$foto){
        $consulta = "INSERT into `producto`(nombre, precio, marca, descripcion,foto) VALUES ('$Nombre','$Precio','$Marca','$Descripcion','$foto')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function buscarProductoRepetido($conexion, $nombre){
        $consulta = "SELECT * FROM `producto` WHERE (`nombre` = '$nombre')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
?>