<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    //SEGURIDAD
    //Recojo la direccion del archivo conexion.php
    $var = "../Codigo/database/conexion.php";
    //si existe el archivo conexión nos redirige a la pagina de inicios
    if(file_exists($var)){
        echo"<script>window.open('../Codigo/index.php','_self')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
        body{
            background-image: url(../Imagenes/img-read/fondo.jpg);
        }

    </style>
<body>
<div class="container rounded-3" style="width: 40rem;"  >
    <div align="center">
    <form method="POST"  style="background: rgba(255,255,255,0.8);" class=" needs-validationC p-5 mt-5" id="formularioRegistro" >
            <div align="center">
                <img src="../Imagenes/img-read/Distribucionestop.png"  width="200px" alt="logo de la empresa" id="foto">
            </div>

            <div align = "center" class="mb-3">
                <h2 class="text-success fw-bolder" style="font-family: Arial, Helvetica, sans-serif;" >FORMULARIO DE PRIMERA INSTALACIÓN</h2>
            </div>
            
                <div class="col-md-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                        </span>
                        <input class="form-control bg-light" type="text" name="db" id="db" placeholder="Nombre de la Base de Datos" alt="introduce aquí" required autofocus> 
                        
                            <!-- Button trigger modal -->

                            <span class="ms-2">
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </svg>
                                </a>
                            </span>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Nombre de la base de datos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Aquí debe escribir el nombre que tendrá su base de datos.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Endentido</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <div class="invalid-feedback">Debe tener una longitud mínima de 6 caracteres. No puede contener acentos.</div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>
            
                <div class="col-md-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </span>
                        <input class="form-control bg-light" type="text" name="user" id="user" placeholder="Nombre de Usuario" alt="introduce aquí"  required> 
                        <!-- Button trigger modal -->

                            <span class="ms-2">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </a>
                            </span>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Nombre de usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Aquí debe escribir el nombre que tendrá su usuario <p class="text-danger">Administrador</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Endentido</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="invalid-feedback">
                        El nombre de usuario debe tener una logitud entre 6 y 20 caracteres.
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>
                        </span>
                        <input class="form-control bg-light" type="text" name="password" id="password" placeholder="Contraseña" alt="introduce aquí" required>
                        
                        <!-- Button trigger modal -->

                            <span class="ms-2">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </a>
                            </span>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Contraseña</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Aquí debe escribir la contraseña que tendrá su cuenta Administrador.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Endentido</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <div class="invalid-feedback">
                        La contraseña no es correcta debe tener Una mayúscula, una minúscula, un número y un caracter especial.
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                        </span>
                        <input class="form-control bg-light" type="text" name="email" id="email" placeholder="email" alt="introduce aquí" required>
                        
                        <!-- Button trigger modal -->

                            <span class="ms-2">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </a>
                            </span>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel4">Correo Electrónico</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Aquí debe escribir el correo electrónico al que quiere asociar su cuenta de Administrador.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Endentido</button>
                                    </div>
                                    </div>
                                </div>
                            </div> 
                        <div class="invalid-feedback">El correo no es válido.</div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                    </div>
                </div>

            <div align="center">
                <button class="btn bg-success text-white" style="width:10rem;" name="registro" id="registro"  type="submit">Primera Instalación</button><br><br>
            </div>
            
            
        </form>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../Codigo/js/validarInstalacionF.js"></script>

<script src="../Codigo/plugins/sweetalert2.all.min.js"></script>

    <!-- <form method="post" id="formularioRegistro"  novalidate action="">
        <input type="text" name="db" id="db" placeholder="db">
        <input type="text" name="user" id="user" placeholder="user">
        <input type="text" name="password" id="password" placeholder="password">
        <input type="text" name="email" id="email" placeholder="email">
        <button name="registro" id="registro"  type="submit">Registrarse</button>
    </form> -->
</body>
</html>


<?php

if(isset($_POST['registro'])){

   $db = $_POST['db'];
   $user = $_POST['user'];
   $pass = $_POST['password'];
   $email =$_POST['email'];

   include "primeraconx.php";
  
    $ddbb = "CREATE DATABASE $db";

   $result = mysqli_query($conexion,$ddbb);

//crear archivo sql del ususario
    echo "<script>
    Swal.fire({
    type: 'success',
    title: '¡Todo listo!.',
    showConfirmButton: false,
    });
    </script>";
   echo "<script>window.open('importacionBD.php?db=$db&user=$user&password=$pass&email=$email','_self')</script>";
   


         
}

?>