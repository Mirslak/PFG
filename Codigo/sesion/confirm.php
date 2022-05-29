
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
            background-image: url(../Imagenes/img-read/fondo.jpg);
        }


    </style>
</head>
<body >


<div class="container rounded-3" style="width: 40rem;"  >
    
    <form method="POST"  style="background: rgba(255,255,255,0.8);" class="p-5 mt-5">
            <a href="index.php" class="text-danger ms-3 mt-3"><img src="../Imagenes/img-read/flecha.png" width="60px" style="float: none;" alt=""></a><br>
            <div align="center"><img src="../Imagenes/img-read/Distribucionestop.png"  width="200px" alt="" id="foto"></div>
            <h2>Código de verificación.</h2>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">⨳</span>
                <input class="form-control bg-light" type="password" name="token" id="token" alt="introduce aquí" required>
                <div class="invalid-feedback">
                El token no es correcto
                </div>
            </div>
            <button class="btn bg-success text-white ms-5" style="width:10rem;"  type="submit" name="confim">Verificar</button>
        </form>
</div>

 <!--------VALIDACION---------->
 <script src="../js/validarConfirm.js"></script>
  
</body>
</html>

<?php
include('../database/conexion.php');
    if(isset( $_POST['confim'])){
        $token = $_POST["token"];
        $email = $_GET["email"];

        $re = $conexion->query("select * from usuario where email = '$email' and token= '$token'") or die($conexsion->error);

        if(mysqli_num_rows($re)> 0){

            echo "<script>
                Swal.fire({
                type: 'success',
                title: 'Se ha confirmado tu cuenta.',
                showConfirmButton: false,
                });
                </script>";
            
            $conexion->query("update usuario set usuario_verificado = '1' where `email` = '$email'");
            
            echo'<meta http-equiv="Refresh" content="1;url=../index.php">';
                

        }else{
            echo "<script>
                Swal.fire({
                type: 'error',
                title: 'Error al verificar tu cuenta.',
                showConfirmButton: true,
                });
                </script>";
        }
    }

?>