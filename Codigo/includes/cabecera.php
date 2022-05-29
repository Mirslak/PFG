<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
include_once "funciones/funciones.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inicios</title>
    <script src="buscador/js/jquery.js"></script>
	<script src="buscador/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="buscador/css/estilos.css">
</head>
<body>

    <!--Navbar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
      <img src="../Imagenes/img-read/Distribuciones 2.png" alt=" foto logo" width="80" " class="d-inline-block align-text-top ms-5">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <div style="width: 600px;; margin-left:25%; margin-right:5%;" ><p class="text-white">-</p></div>
    
 
        <ul class="navbar-nav d-grid gap-2 d-md-flex justify-content-md-end">


    <?php if(isset($_SESSION['user']) && $_SESSION['rol_usuario']=='0'){ ?>
           
            <li class='nav-item'>
                <a href="sesion/cuenta.php" class="btn btn-danger bg-light border-0 text-danger me-3">
                    <img src='../Imagenes/img-read/usuario-dos.png' alt='' width='30'> <br>
                    <p class="text-danger">Hola, <?php echo $_SESSION['nombre'];echo " "; echo $_SESSION['apellido1']?></p>
                </a>
            </li>
            <li class='nav-item'>
                 <a type='button' class='btn btn-danger bg-light border-0 text-danger me-3  ' href='includes/carrito.php'>
                     <img src='../Imagenes/img-read/carrito-logo.png' alt='' width='30'> <br>       
                      Comprar
                </a>
              </li>
              <li class='nav-item'>
                 <a type='button' class='btn btn-danger bg-light border-0 text-danger me-3  ' href='sesion/logout.php'>
                    <img src='../Imagenes/img-read/cerrar-sesion.png' alt='' width='30'> <br>
                     Cerrar sesión
                </a>
              </li>

    <?php } else if(isset($_SESSION['user']) && $_SESSION['rol_usuario']=='1'){ ?>
        
        <li class='nav-item'>
                <a href="sesion/cuenta.php" class="btn btn-danger bg-light border-0 text-danger me-3">
                    <img src='../Imagenes/img-read/usuario-dos.png' alt='' width='30'> <br>
                    <p class="text-danger">Hola, <?php echo $_SESSION['nombre'];echo " "; echo $_SESSION['apellido1']?></p>
                </a>
            </li>
              <li class='nav-item'>
                 <a type='button' class='btn btn-danger bg-light border-0 text-danger me-3  ' href='sesion/logout.php'>
                    <img src='../Imagenes/img-read/cerrar-sesion.png' alt='' width='30'> <br>
                     Cerrar sesión
                </a>
              </li>
        
    <?php }else{ ?>

        <li class='nav-item '>
                <a type='button' class='btn btn-danger bg-light border-0 text-danger' href='sesion/login.php'>
                      <img src='../Imagenes/img-read/user-logo.png' alt='' width='30'> <br>   
                      Iniciar sesión
                 </a>
        </li>
        <li class='nav-item '>
                <a type='button' class='btn btn-danger bg-light border-0 text-danger' href='sesion/registro.php'>
                      <img src='../Imagenes/img-read/nuevouser.png' alt='' width='30'> <br>   
                      Registrarse
                 </a>
        </li>

   <?php } ?>
        </ul>
    </div>
  </div>
</nav>

<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-5">
        <li class="nav-item">
                <a href="index.php"><button type="button" class="btn btn-outline-light border-0 me-3" href="../index.php">   
                  Inicio
                </button></a>
            </li>

            <?php if(isset($_SESSION['user'])){ ?>
                <li class="nav-item">
                    <a href="includes/carrito.php">
                        <button type="button" class="btn btn-outline-light border-0 me-3" href="includes/carrito.php">   
                        Comprar
                        </button>
                    </a>
                </li>
            <?php } ?>
            
            <?php if(isset($_SESSION['user']) && $_SESSION['rol_usuario']=='1'){ ?>
            <li class="nav-item">
            <a href="administrador/sesion/login.php"><button type="button" class="btn btn-outline-light border-0 me-3" href="/Codigo/administrador/sesion/login.php">   
                  Zona Administrador
                </button></a>
            </li>
            <?php } ?>

        </ul>
    </div>
</nav>

<!--Buscador Tabla-->
<?php

?>
    <!--Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="buscador/js/buscador.js"></script>
</body>
</html>