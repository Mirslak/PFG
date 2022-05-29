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
    
    <form method="POST"  style="background: rgba(255,255,255,0.8);" class="p-5 mt-5">
            <a href="../index.php" class="text-danger ms-3 mt-3"><img src="../../Imagenes/img-read/flecha.png" width="60px" style="float: none;" alt=""></a><br>
            <div align="center"><img src="../../Imagenes/img-read/Distribucionestop.png"  width="200px" alt="" id="foto"></div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                    </span>
                    <input class="form-control bg-light" type="email" name="email" id="email" placeholder="Correo Electronico" alt="introduce aquí" required>
                    <div class="invalid-feedback">
                    Por favor, introduzca su Correo Electronico.
                    </div>
                </div>

                <div align="center">
                    <button class="btn bg-success text-white ms-5" style="width:10rem;"  type="submit" name="inicio" >Enviar</button><br><br>
                </div>
            
            
        </form>
</div>

<!--Validacion-->
<script src="../js/validarCorreo.js"></script>
  
</body>
</html>

<?php
    if(isset( $_POST['inicio'])){
        $email = $_POST["email"];

        $consulta = consulta_correo($conexion, $email);
        
         
        if(mysqli_num_rows($consulta)== 1){
    

            $fila = mysqli_fetch_assoc($consulta);
            $pass=implode("", $fila); //Lo paso a string

            include "../mail/mail_pass.php";
       
            echo "<script>
                Swal.fire({
                type: 'success',
                title: 'Se ha enviado su contraseña.',
                showConfirmButton: false,
                },);
                </script>";
            
               echo'<meta http-equiv="Refresh" content="1;url=login.php">';

        }else{
            
            echo "<script>
                Swal.fire({
                type: 'error',
                title: 'Usuario no encontrado.',
                showConfirmButton: false,
                });
                </script>";
        }
    }

?>