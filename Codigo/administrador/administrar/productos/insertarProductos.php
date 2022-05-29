<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    //Incluimos el conector a la Base de datos e iniciamos la sesión
    include "../../../database/conexion.php";
    session_start();

     //Incluimos el fichero donde están las funciones
     include "../../includes/DAO/DAO_Productos.php";
    
    //Esto impedirá que se acceda sin iniciar sesión y si el usuario logueado no tiene el rol de Admin volverá al login
    if (empty($_SESSION['rol_usuario'])){
        
        echo "<script>window.open('../../sesion/login.php','_self')</script>";
        
    }else{
?>

<?php include "../../includes/header.php"; ?>

<div align="center">
  <div class="card" style="max-width: 800px;">
        <div class="card-header" >
            <a href="productos.php" style="color: black">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class=" bi bi-arrow-left-circle-fill m-2" viewBox="0 0 16 16" >
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
        </div>
    
        <div class="card-body">
            <h3 class="border-2 mt-3 text-uppercase" align="center">Insertar Productos</h3>  
            <form id="editarProducto" enctype="multipart/form-data" method="post" class="needs-validationC">
                <div class="row">  
                    <!--Nombre-->
                    <div class="col-md-6">
                        <div align="left"><h5> Nombre</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                </svg>
                            </span>
                            <input type="text" name="nombre" id="nombre" class="form-control"  required alt="complete">
                            <div class="invalid-feedback">El nombre tiene una longitud mínima de 6 caracteres y máximo de 20 caracteres, no se permiten acentos, espacios ni caracteres especiales.</div>
                        </div>
                    </div>
                    <!-- Termina Nombre -->

                    <!-- Precio -->
                    <div class="col-md-6">
                        <div align="left"><h5> Precio</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                                    <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479L12.258 3z"/>
                                </svg>
                            </span>
                            <input type="text" name="precio" id="precio" class="form-control"  required>
                            <div class="invalid-feedback">El precio introducido no es válido.</div>
                        </div>
                    </div>
                    <!-- Termina Precio -->  
    
                        <!-- Marca -->
                        <div class="col-md-6">
                            <div align="left"><h5> Marca</h5></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                                        <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479L12.258 3z"/>
                                    </svg>
                                </span>
                                <input type="text" name="marca" id="marca" class="form-control"  required alt="complete">
                                <div class="invalid-feedback">La marca no es válida.</div>
                            </div>
                        </div>
                        <!-- Termina Marca -->
        
                        <!-- Descripción -->
                
                            <div class="col-md-6 mb-2">
                                    <div align="left"><h5> Descripción</h5></div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </span>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control"  required alt="complete">
                                    </div>
                            </div>
                            <!-- Termina Descripción -->

                        <!-- Foto -->
                
                        <div class="col-md-6 mb-2">
                                    <div align="left"><h5> Foto</h5></div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </span>
                                        <input type="file" class="input-file" id="img" name="img" type="file" accept=".jpg,.png,.pdf"  required alt="complete">
                                    </div>
                        </div>
                        <!-- Foto -->
                    </div>
                </div>
                

                <div align="center">
                    <div style="width: 50%">
                        <input name="insertar" value="Insertar producto" type="submit" class="btn btn-warning form-control " style="border: black 2px solid" alt="complete">
                    </div>
                </div>
                
            </div>
            <div class="card-footer text-muted">
                <a href="productos.php">Ir a los Productos</a>
            </div>
    </div>
</div>
<script src="../../../js/validarProducto.js"></script>
<script src="../../plugins/sweetalert2.all.min.js"></script>
<br>

<?php } ?>

<?php
if(isset($_POST['insertar'])){

    //Recogemos los datos del formulario
    $Marca = $_POST["marca"];

    $Nombre = $_POST["nombre"];

    $Precio = $_POST["precio"];

    $Descripcion = $_POST["descripcion"];

    //Imagen
    $nombreImg = $_FILES['img']['name'];
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFinalDAW/Imagenes/productos/';
    
    //Comprobamos si el Producto existe, si existe se detendrá el registro.
    $compruebaProducto = buscarProductoRepetido($conexion, $Nombre);

    if(mysqli_num_rows($compruebaProducto) == 1){
        echo "<script>
            Swal.fire({
            type: 'error',
            title: 'ERROR. El Producto introducido ya existe.',
            showConfirmButton: false,
            });
            setTimeout(function(){
            Swal.close();
            }, 1500);
        </script>";
        exit();
    }

	$consulta = insertarProducto($conexion, $Nombre, $Precio, $Marca, $Descripcion,$nombreImg);
	
        if($consulta){;
            move_uploaded_file($_FILES['img']['tmp_name'], $ruta.$nombreImg); //Movemos la imagen a la carpeta
            echo "<script>
                Swal.fire({
                type: 'success',
                title: 'Producto isertado Correctamente.',
                showConfirmButton: false,
                });
                </script>";
            
                echo'<meta http-equiv="Refresh" content="1;url=productos.php">';

        }else{
            echo "<script>
                Swal.fire({
                type: 'error',
                title: 'Error al insertar el producto.',
                showConfirmButton: false,
                });
                </script>";
        }
}

?>