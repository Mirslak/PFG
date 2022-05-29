<?php
function generarFactura($conexion,$nombreProducto, $cantidad, $precio, $idProducto){
    $consulta = "INSERT INTO `pedido` (`nombre`, `cantidad`, `precio`, `id_producto`) VALUES ('$nombreProducto', '$cantidad', '$precio', '$idProducto')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function insertarFactura($conexion,$fecha, $id_usuario){
    $consulta = "INSERT INTO `factura` (`fecha`, `id_usuario`) VALUES ('$fecha', '$id_usuario')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

?>