<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    include_once "../database/conexion.php";
    include_once "../funciones/funciones.php";

    //recojo la ruta del archivo conexión
    $ruta = '../database/conexion.php';

    //si no existe el archivo conexión nos redirige a la pagina de instalación
    if(!file_exists($ruta)){
        echo"<script>window.open('../../instalacion/index.php','_self')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registro</title>
    <style>
        body{
            background-image: url(../../Imagenes/img-read/fondo.jpg);
        }
    </style>

    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body >
<div align="center" class="mt-5 mb-5">
  <div class="card" style="background: rgba(255,255,255,0.8); max-width: 60%;" >
    <a href="../index.php" class="text-danger ms-3 mt-3">
        <img src="../../Imagenes/img-read/flecha.png" width="60px" alt="" style="float: left;">
    </a>
    <br>
    <div class="text-center">
        <img src="../../Imagenes/img-read/Distribuciones 2.png"  width="110px" alt="">
    </div>

    <div class="text-center">
        <h1 class="fw-bold text-success">Formulario de registro</h1>
    </div>
        
    <div class="card-body"  >
        <form id="editarUsuario"  method="post" class="needs-validationC">
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
                        <input type="text" name="usuario" id="usuario" class="form-control" required>
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
                        <input type="password" name="password" id="password" class="form-control" required alt="complete">
                        <div class="invalid-feedback">
                        La contraseña no es correcta debe tener Una mayúscula, una minúscula, un número y un caracter especial.
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div align="left"><h5> Repita su contraseña</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" name="password2" id="password2" class="form-control" required alt="complete">
                        <div class="invalid-feedback">
                        La contraseña no coincide.
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="row">
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
        

                <div class="col-md-6">
                    <div align="left"><h5> DNI</h5></div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <input type="text" name="dni" id="dni" class="form-control" required alt="complete" >
                        </div>
                </div>

            </div>
            <div class="row">
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
            </div>
            <div class="row">
                    <!-- Teléfono -->
                    <div class="col-md-4">
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
                <div class="col-md-4">
                    <div align="left"><h5> Direccion</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </span>
                        <select class="form-control" name="direccion" id="direccion" required alt="complete">
                            <option value="">Selecione uno:</option>
                            <option value="melilla">Melilla</option>
                        </select>
                    </div>
                </div>
                <!-- Termina Direccion -->
                <div class="col-md-4">
                    <div align="left"><h5> Codigo Postal</h5></div>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </span>
                        <input type="number" name="codigoP" id="codigoP" class="form-control"  required alt="">
                            <div class="invalid-feedback">
                            Por favor, escriba su telefono.
                            </div>
                            <div class="valid-feedback">
                            Correcto!
                            </div>
                    </div>
                </div>
                    
            </div>
    </div>

            <div align="center" class="mb-3">
                <div style="width: 50%">
                    <input name="registro" value="Registrar Usuario" type="submit" class="btn btn-success form-control " style="border: black 2px solid" alt="complete">
                </div>
            </div>
        </form>
  </div>
</div>
        <script src="../js/validarRegistro.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>


<?php
 
    if(isset( $_POST['registro'])){
        
        $user = $_POST["usuario"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $email = $_POST["email"];
        $dni = $_POST["dni"];
        $direccion = $_POST['direccion'];
        $Cpostal = $_POST['codigoP'];
        $telefono = $_POST['telefono'];

        
        //Comprobamos si el user existe, si existe se detendrá el registro.
        $compruebaUser = buscarUserRepetido($conexion, $user);

        if(mysqli_num_rows($compruebaUser) == 1){
            echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'ERROR. El usuario introducido está en uso.',
                showConfirmButton: false,
                });
                setTimeout(function(){
                Swal.close();
                }, 1500);
            </script>";
            exit();
        }

        //Comprobamos si el correo existe, si existe se detendrá el registro.
        $compruebaEmail = buscarEmailRepetido($conexion, $email);

        if(mysqli_num_rows($compruebaEmail) == 1){
            echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'ERROR. El correo introducido está en uso.',
                showConfirmButton: false,
                });
                setTimeout(function(){
                Swal.close();
                }, 1500);
            </script>";
            exit();
        }

        //Por defecto el usuario registrado tendrá rol de usuario = 0
        $rol_usuario=0;
        
        include_once('../mail/mail.php');

        if($enviado){
        $query = "INSERT into usuario (user, password, nombre, apellido1, apellido2, email, telefono,dni, direccion,CodigoPostal,usuario_verificado,rol_usuario,token) VALUES ('$user','$password','$nombre','$apellido1','$apellido2','$email','$telefono','$dni','$direccion','$Cpostal','1','$rol_usuario','$token')";
        $result = mysqli_query($conexion, $query);

        
            
            echo'<meta http-equiv="Refresh" content="1;url=confirm.php?email='.$email.'">';

        }else{
            die('Query Failed.');
        }        
    }

?>