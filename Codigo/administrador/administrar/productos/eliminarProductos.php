<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
    //Incluimos el conector a la Base de datos 
    include "../../../database/conexion.php";

    //Incluimos los ficheros donde están las funciones
    include "../../includes/DAO/DAO_Productos.php";

    //Recogemos el ID recibido por URL y buscamos al usuario
    $idURL = $_GET["id"]; 

    $get_Producto = mostrarProductosPorID($conexion, $idURL);
        
    $row_del = mysqli_fetch_assoc($get_Producto);

    
    //Procedemos a eliminar al usuario de la base de datos
    $consulta = eliminarProducto($conexion, $idURL);

    if($consulta){

        echo "<script>
        Swal.fire({
        type: 'success',
        title: 'Producto Eliminado Correctamente.',
        showConfirmButton: false,
        });
        </script>";
    
        echo'<meta http-equiv="Refresh" content="1;url=productos.php">';

}else{
    echo "<script>
        Swal.fire({
        type: 'error',
        title: 'Error al eliminar el producto.',
        showConfirmButton: false,
        });
        </script>";
}
?>