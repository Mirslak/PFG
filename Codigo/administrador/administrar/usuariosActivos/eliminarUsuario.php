<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
    //Incluimos el conector a la Base de datos 
    include "../../../database/conexion.php";

    //Incluimos los ficheros donde están las funciones
    include "../../includes/DAO/DAO_Usuarios.php";

    //Recogemos el ID recibido por URL y buscamos al usuario
    $idURL = $_GET["id"]; 

    $get_usuario = mostrarUsuariosPorID($conexion, $idURL);
        
    $row_del = mysqli_fetch_assoc($get_usuario);

    
    //Procedemos a eliminar al usuario de la base de datos
    $consulta = eliminarUsuario($conexion, $idURL);

    if($consulta){


        echo "<script>alert('El usuario ha sido eliminado correctamente.')</script>";

        echo "<script>window.open('usuariosActivos.php','_self')</script>";

    } else {

        echo "<script>alert('El usuario no se ha podido eliminar.')</script>";
            
        echo "<script>window.open('usuariosActivos.php','_self')</script>";
    }
?>