<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
    //Incluimos el conector a la Base de datos e iniciamos la sesión
    include("../database/conexion.php");
    session_start();

    //recojo la ruta del archivo conexión
    $ruta = '../database/conexion.php';
    //si no existe el archivo conexión nos redirige a la pagina de instalación
    if(!file_exists($ruta)){
        echo"<script>window.open('../../instalacion/index.php','_self')</script>";
    }

    
    //Esto impedirá que se acceda sin iniciar sesión y si el usuario logueado no tiene el rol de Admin volverá al login
    if (empty($_SESSION['rol_usuario'])){
        
        echo "<script>window.open('sesion/login.php','_self')</script>";
        
    }else{
       
?>
<?php
    //Inclumis los ficheros necesarios
    include "includes/DAO/DAO_Usuarios.php";

    //Contamos los usuarios activos
    $consultaActivos = mostrarUsuariosActivos($conexion);

    $numeroActivos = mysqli_num_rows($consultaActivos);

    //Contamos los usuarios inactivos
    $consultaInactivos = mostrarUsuariosInactivos($conexion);

    $numeroInactivos = mysqli_num_rows($consultaInactivos);

    //Contamos los usuarios Productos
    $consultaInactivos = mostrarProductos($conexion);

    $numeroProductos = mysqli_num_rows($consultaInactivos);

    //Contamos los Factura
    $consultaFacturas = mostrarFacturas($conexion);
    $numeroFacturas = mysqli_num_rows($consultaFacturas);




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body style="background-image: url('../../Imagenes/img-read/zonaAdmin-wall.png');">
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../../Imagenes/img-read/Distribuciones 2.png" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><span class="fas fa-home" style="color: white"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar/usuariosActivos/usuariosActivos.php"><span class="fas fa-users" style="color: yellow"></span> Usuarios Activos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar/usuariosInactivos/usuariosInactivos.php"><span class="fas fa-users" style="color: yellow"></span> Usuarios Inactivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar/productos/productos.php"><span class="fa fa-boxes" style="color: yellow"></span> Edición de Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar/facturas/facturas.php"><span class="fas fa-calendar" style="color: yellow"></span> Edición de Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar/cuenta/cuenta.php"><span class="fas fa-address-card" style="color: white"></span> Mi Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sesion/salir.php" style="color: red"><span class="fas fa-power-off"></span> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <h1 align="center" class="text-light">¡Bienvenido a la zona de Administrador!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="administrar/usuariosActivos/usuariosActivos.php" class="text-decoration-none text-black"> 
                    <div class="card mb-1" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 bg-primary" align="center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-lines-fill " viewBox="0 0 16 16" style="color: white;"> 
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">ZONA USUARIO ACTIVOS</h5>
                                    <p class="card-text">Aquí puedes gestionar los usuarios activos de tu página web.</p>
                                    <p class="text-uppercase fw-bold">Actualmente: <?php echo $numeroActivos?></p>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="administrar/usuariosInactivos/usuariosInactivos.php" class="text-decoration-none text-black"> 
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 bg-danger" align="center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16" style="color: white;">
                                    <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">ZONA USUARIO INACTIVOS</h5>
                                    <p class="card-text">Aquí puedes gestionar los usuarios inactivos de tu página web.</p>
                                    <p class="text-uppercase fw-bold">Actualmente: <?php echo $numeroInactivos?></p>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="administrar/productos/productos.php" class="text-decoration-none text-black"> 
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 bg-dark" align="center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="145" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16" style="color: white; position: relative; top: 10px;">
                                    <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                                </svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder text-uppercase">Administracion de Productos</h5>
                                    <p class="card-text">Aquí puedes gestionar los productos de tu empresa.</p>
                                    <p class="text-uppercase fw-bold">Actualmente: <?php echo $numeroProductos?></p>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
            
    
            <div class="col-md-6">
                <a href="administrar/facturas/facturas.php" class="text-decoration-none text-black"> 
                    <div class="card mb-3" style="max-width: 540px;">
                         <div class="row g-0">
                            <div class="col-md-4 bg-dark" align="center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="145" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16" style="color: white; position: relative; top: 10px;">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder text-uppercase">Administracion de facturas</h5>
                                    <p class="card-text">Aquí puedes gestionar las Facturas de tu empresa.</p>
                                    <p class="text-uppercase fw-bold">Actualmente: <?php echo $numeroFacturas;?></p>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!--TABLA CON LOS ULTIMOS USUSARIOS-->
        <table  class="table table-bordered bg-light" cellspacing="0" cellpadding="0">
            <tr class="fw-bolder text-uppercase " align="center" style="background: rgba(188, 248, 250, 0.3);">
                <th>Usuario</th>
                <th>DNI</th>
                <th>Correo</th>
                <th>Estado</th>
            </tr>
            <div class="card border" >
                <div class="card-header bg-primary text-white fw-bolder" align="center">
                    ULTIMOS USUARIOS REGISTRADOS
                </div>

                <?php
    
                       $consulta = mostrarUsuarios($conexion);
                   
                   //Recorreremos la tabla de los usuarios y mostraremos sus datos
                   while($mostrar = mysqli_fetch_array($consulta)) {

                       ?>
                        <tr style="text-align: center;">
                            <td><strong><?php echo $mostrar['user']; ?></strong></td>
                            <td><strong><?php echo $mostrar['dni']; ?></strong></td>
                            <td><strong><?php echo $mostrar['email']; ?></strong></td>
                            <td><strong><?php if($mostrar['usuario_verificado']==1){echo"Activo";}else{echo "Inactivo";}; ?></strong></td>
                        </tr>
                        <?php
                   }
                ?>
            </div>
        </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src=""></script>
</body>
</html>

<?php } ?>