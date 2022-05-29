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
    <title>Login</title>

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- sweetalert2 -->
    <script src="../plugins/sweetalert2.all.min.js"></script>
    <style>
        body{
            background-image: url(../../Imagenes/img-read/fondo.jpg);
        }

    </style>
</head>
<body >


<div class="container rounded-3" style="width: 40rem;"  >
    
    <form method="POST"  style="background: rgba(255,255,255,0.8);" class=" needs-validationC p-5 mt-5">
            <a href="../index.php" class="text-danger ms-3 mt-3"><img src="../../Imagenes/img-read/flecha.png" width="60px" style="float: none;" alt=""></a><br>
            <div align="center"><img src="../../Imagenes/img-read/Distribucionestop.png"  width="200px" alt="" id="foto"></div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </span>
                
                <input class="form-control bg-light" type="text" name="usuario" id="usuario" placeholder="Usuario" autofocus required alt="complete">
                <div class="invalid-feedback">
                El nombre de usuario debe tener una logitud entre 6 y 20 caracteres.
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                        <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                    </svg>
                </span>
                <input class="form-control bg-light" type="password" name="password" id="password" placeholder="Contraseña" required alt="complete">
                <div class="invalid-feedback">
                Por favor, introduzca su contraseña.
                </div>
            </div>

            <div align="center">
                <button class="btn bg-success text-white ms-5" style="width:10rem;"  type="submit" name="inicio">Login</button><br><br>
                <a href="cambioPass.php" class="ms-4">¿Has olvidado la contraseña?</a>
            </div>
            
            
        </form>
</div>


 <!--------VALIDACION---------->
 <script src="../js/validarLogin.js"></script>
  
</body>
</html>

<?php
    if(isset( $_POST['inicio'])){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $consulta = consulta_usuario($conexion, $usuario, $password);
        

        if(mysqli_num_rows($consulta)== 1){
            $fila = mysqli_fetch_assoc($consulta);
            crearSesion($fila);

            echo "<script>
                Swal.fire({
                type: 'success',
                title: 'Iniciando Sesión.',
                showConfirmButton: false,
                });
                </script>";
            
                echo'<meta http-equiv="Refresh" content="1;url=../index.php">';

        }else{
            echo "<script>
                Swal.fire({
                type: 'error',
                title: 'Usuario no encontrado o no verificado.',
                showConfirmButton: false,
                });
                </script>";

                echo'<meta http-equiv="Refresh" content="1;url=login.php">';
        }
    }

?>