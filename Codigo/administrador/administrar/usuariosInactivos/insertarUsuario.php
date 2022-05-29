<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
    //Incluimos el conector a la Base de datos e iniciamos la sesión
    include "../../../database/conexion.php";
    session_start();


    //Incluimos los ficheros donde están las funciones
    include "../../includes/DAO/DAO_Usuarios.php";
 
    
    //Esto impedirá que se acceda sin iniciar sesión y si el usuario logueado no tiene el rol de Admin volverá al login
    if (empty($_SESSION['rol_usuario'])){
        
        echo "<script>window.open('../../sesion/login.php','_self')</script>";
        
    }else{
?>

<?php include "../../includes/header.php"; ?>

<

    


<div align="center">
  <div class="card" style="max-width: 800px;">
    <div class="card-header" >
        <a href="usuariosInactivos.php" style="color: black">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class=" bi bi-arrow-left-circle-fill m-2" viewBox="0 0 16 16" >
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </a>
    </div>
    <div class="card-body">
        <h3 class="border-2 mt-3 text-uppercase" align="center">Registrar Usuario</h3>  
        <form id="editarUsuario" enctype="multipart/form-data" method="post" class="needs-validationC">
            <div class="row">  
                <!-- Usuario -->
                <div class="col-md-6">
                    <div align="left"><h5> Usuario</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                        </span>
                        <input type="text" name="usuario" id="usuario" class="form-control" required alt="complete"> 
                        <div class="invalid-feedback">
                        Su nombre debe tener una longitud mínima de 6 caracteres. No puede contener acentos.
                        </div>
                        <div class="valid-feedback">
                        Correcto!
                        </div>
                    </div>
                </div>
                <!-- Termina Usuario -->

                <!-- Nombre -->
                <div class="col-md-6">
                    <div align="left"><h5> Nombre</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                                <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479L12.258 3z"/>
                            </svg>
                        </span>
                        <input type="text" name="nombre" id="nombre" class="form-control" required alt="complete">
                        <div class="invalid-feedback">
                        Su nombre de usuario debe tener una longitud mínima de 6 caracteres. No puede contener acentos.
                        </div>
                        <div class="valid-feedback">
                        Correcto!
                        </div>
                    </div>
                </div>
            </div>
            <!-- Termina Nombre -->  

            <!-- Contraseña -->
            <div class="row">
                <div class="col-md-6">
                    <div align="left"><h5> Contraseña</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" name="password" id="password" class="form-control" alt="complete">
                        <div class="invalid-feedback">
                        La contraseña debe tener una mayúscula, una minúscula, un número y un caracter especial.
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
                <!-- Termina Contraseña -->

                <!-- Apellido -->
                <div class="col-md-6">
                    <div align="left"><h5> Apellido 1</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                                <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479L12.258 3z"/>
                            </svg>
                        </span>
                        <input type="text" name="apellido1" id="apellido1" class="form-control" required alt="complete">
                        <div class="invalid-feedback">
                        Por favor, escriba su apellido.
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
            </div>
            <!-- Termina Apellido -->

            <!-- Dirección -->
            <div class="row">
                <div class="col-md-6">
                    <div align="left"><h5> DNI</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <input type="text" name="dni" id="dni" class="form-control"  alt="cc" required>
                            <div class="invalid-feedback">
                            DNI no válido.
                            </div>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        </div>
                </div>
                    <!-- Termina Dirección -->

                    <!-- Apellido 2 -->
                    <div class="col-md-6">
                        <div align="left"><h5> Apellido 2</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                                    <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479L12.258 3z"/>
                                </svg>
                            </span>
                            <input type="text" name="apellido2" id="apellido2" class="form-control" required alt="complete">
                            <div class="invalid-feedback">
                            Por favor, escriba su apellido.
                            </div>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Termina Apellido 2 -->

            <!-- Correo -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div align="left"><h5> Correo</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                        </span>
                        <input type="email" name="email" id="email" class="form-control" required alt="complete">
                        <div class="invalid-feedback">El correo no es válido.</div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
                <!-- Termina Correo -->
        
                    <!-- Teléfono -->
                    <div class="col-md-6">
                        <div align="left"><h5> Teléfono</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </span>
                            <input type="number" name="telefono" id="telefono" class="form-control"  required alt="complete">
                            <div class="invalid-feedback">
                            Por favor, escriba su telefono.
                            </div>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                        </div>
                    </div>
                    <!-- Termina Teléfono -->

            <!-- Direccion -->
            <div class="col-md-6">
                    <div align="left"><h5> Direccion</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </span>
                        <select class="form-control" name="direccion" id="direccion" required>
                            <option value="">Selecione uno:</option>
                            <option value="melilla">Melilla</option>
                        </select>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                    </div>
                </div>
                <!-- Termina Direccion -->
    
                    <!-- Estado -->
                    <div class="col-md-3">
                        <div align="left"><h5> Estado</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <select class="form-control" name="estado" id="estado" required>
                                <option value="">Selecione uno:</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div align="left"><h5> Rol</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <select class="form-control" name="rol_usuario" id="rol_usuario" required>
                                <option value="">Selecione uno:</option>
                                <option value="1">Administrador</option>
                                <option value="0">Usuario</option>
                            </select>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div align="left"><h5> Codigo Postal</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <input  type="number" class="form-control" name="codigoP" id="codigoP"  required>
                            <div class="invalid-feedback">
                            Código postal no válido.
                            </div>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Termina Estado -->
            </div>

            <div align="center">
                <div style="width: 50%">
                    <input name="actualizar" value="Registrar Usuario" type="submit" class="btn btn-warning form-control " style="border: black 2px solid" alt="complete" alt="complete">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-muted">
        <a href="usuariosInactivos.php">Ir a los Usuarios</a>
    </div>
</div>
    </div>

<script src="../../plugins/sweetalert2.all.min.js"></script>
<script src="../../../js/validarEdicion.js"></script>

<?php } ?>

<?php
if(isset($_POST['actualizar'])){

    //Recogemos los datos del formulario

    
   $usuario = $_POST["usuario"];
 
   $password = $_POST["password"];
    
   $nombre = $_POST["nombre"];

   $apellido1 = $_POST["apellido1"];
    
   $apellido2 = $_POST["apellido2"];

   $email = $_POST["email"];
    
   $telefono = $_POST["telefono"];
    
   $dni = $_POST['dni'];

   $direccion =$_POST['direccion'];
  
   $codigoP = $_POST['codigoP'];
    
   $estado = $_POST["estado"];

   $rol_usuario = $_POST['rol_usuario'];

    
    //Comprobamos si el correo existe, si existe se detendrá el registro.
    $compruebaEmail = buscarEmailRepetido($conexion, $email);

    if(mysqli_num_rows($compruebaEmail) == 1){
        echo "<script>
            Swal.fire({
            type: 'error',
            title: 'ERROR. El correo introducido está en uso.',
            showConfirmButton: false,
            });
            setTimeout(function(){
            Swal.close();
            }, 1500);
        </script>";
        exit();
    }


   
	
    $consulta = "INSERT into usuario (user, password, nombre, apellido1, apellido2, email, telefono,dni, direccion,CodigoPostal,
    usuario_verificado,rol_usuario) VALUES ('$usuario','$password','$nombre','$apellido1','$apellido2','$email','$telefono',
    '$dni','$direccion','$codigoP','$estado','$rol_usuario')";
    $resultado = mysqli_query($conexion, $consulta);
        
        if($resultado){
           
            echo "<script>
            Swal.fire({
            type: 'success',
            title: 'Editado Correctamente.',
            showConfirmButton: false,
            });
            </script>";
        
            echo'<meta http-equiv="Refresh" content="1;url=usuariosInactivos.php">';
        } else {
            echo "<script>
                Swal.fire({
                type: 'error',
                title: 'Error al editar.',
                showConfirmButton: false,
                });
                </script>";
        }
	
}