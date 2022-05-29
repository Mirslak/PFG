<?php
    function mostrarFacturasPorID($conexion, $idFactura){
        $consulta = "SELECT * FROM `factura` WHERE num_factura = '$idFactura'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarFactura($conexion){
            $consulta = "SELECT `num_factura`, `fecha`, U.`nombre`FROM `factura` F INNER JOIN `usuario` U ON F.`id_usuario` = U.`id`";
            $resultado = mysqli_query($conexion, $consulta);
            return $resultado;
    }

    function ModificarFactura($conexion, $idFactura, $idUsuario, $Fecha){
        $consulta = "UPDATE `factura` SET `num_factura` = '$idFactura', `id_usuario` = '$idUsuario',
        `fecha` = '$Fecha' WHERE `num_factura` = '$idFactura'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function eliminarFactura($conexion, $idFactura){
        $consulta = "DELETE FROM `factura` WHERE `num_factura` = '$idFactura'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }


    
?>