<?php
include_once "includes/cabecera.php";
include_once "database/conexion.php";
include_once "funciones/funciones.php";

//recojo la ruta del archivo conexión
$ruta = 'database/conexion.php';

//si no existe el archivo conexión nos redirige a la pagina de instalación
if(!file_exists($ruta)){
    echo"<script>window.open('../instalacion/index.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Inicio</title>
</head>
<body>

<!--Carrusel-->
<div align="center" class="col-sm-13" >
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="../Imagenes/coca-cola.jpg" class="d-block w-100" style="height: 400px;" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../Imagenes/cabecera_fanta.jpg" class="d-block w-100" style="height: 400px;" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../Imagenes/monster.jpg" class="d-block w-100" style="height: 400px;" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
<div class="bg-danger mb-2" style="height: 10px;">
</div>
<!--Titulo-->

<div class="container mb-3">
        <h1 class="text-center mt-5 text-uppercase fw-bolder text-success" style="font-family: Arial, Helvetica, sans-serif; ">Bienvenido a Distribuciones Carbónicas S.L</h1>
        <div align="center" class="me-3"><img src="/pagina/img/barra.png" alt="" width="150px" alt=""></div>
        <p style="font-family: Arial, Helvetica, sans-serif; color:#42515E;" class="fs-4" >Distribuciones Carbónicas S.L es una empresa especializada en la distribución de bebidas cárbonatadas originaria de la ciudad autónoma de Melilla  (España). Acceda a nuestro catálogo y disfrute de una alta gama de productos de primeras marcas , podrá comprar desde cualquier lugar para su negocio o para su hogar.</p>

        <h2 class="text-center mt-5 text-uppercase fw-bolder" style="font-family: Arial, Helvetica, sans-serif; color:#42515E;">Beneficios</h2>
        <div class="row">
            <div class="col-md-4" style="background-color: #E32907;">
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-alarm text-light" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg>
                </div>
                
                <div align="center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-dash-lg text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                    </svg>
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Sin límites las 24 Horas</p>
            </div>


            <div class="col-md-4" style="background-color: #FA4843;"> 
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-alarm text-light" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    </svg>
                </div>
                
                <div align="center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-dash-lg text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                    </svg>
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Pide tu pedido desde cualquier lugar</p>
            </div>

            <div class="col-md-4" style="background-color: #FA6460;"> 
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-alarm text-light" viewBox="0 0 16 16">
                        <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                    </svg>
                </div>
                
                <div align="center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-dash-lg text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                    </svg>
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Accede a todos nuestros productos</p>
            </div>

            <div class="col-md-12" style=" background: #FAA59F;"> 
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-alarm text-light" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                    </svg>
                    </svg>
                </div>
                
                <div align="center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-dash-lg text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                    </svg>
                </div>
                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Para Grandes empresas, medianas empresas y particulares.</p>
            </div>
        </div>
        
        <!--Como funciona-->
        <h2 class="text-center mt-5 text-uppercase fw-bolder" style="font-family: Arial, Helvetica, sans-serif; color:#42515E;">¿Cómo funciona?</h2>
        <div class="row" style="background: rgba(74,91,99,0.3);">
            <div class="col-md-3">
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="currentColor" class="bi bi-dash-lg " style="color: #FAEB63;" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </div>
                

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Rellene el formulario de registro</p>
            </div>

            <div class="col-md-3">
                
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="currentColor" class="bi bi-dash-lg " style="color: #FAEB63;" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                    </svg>
                    
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Recibirá un correo de confirmación</p>
            </div>

            <div class="col-md-3">
                
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="currentColor" class="bi bi-dash-lg " style="color: #FAEB63;" viewBox="0 0 16 16">
                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
                    </svg>
                    
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder">Introduzca su usuario y Contraseña</p>
            </div>

            <div class="col-md-3">
                
                <div align="center" class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="currentColor" class="bi bi-dash-lg " style="color: #FAEB63;" viewBox="0 0 16 16">
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                </div>

                <p style="font-family: Arial, Helvetica, sans-serif; color:white;" class="text-center mb-5 fw-bolder ">Haga su pedido</p>
            </div>
        </div>
    </div>
</div>

<!--Carrito-->
<div align="center" class="mb-5" >
<h2 class="text-center mt-5 text-uppercase fw-bolder" style="font-family: Arial, Helvetica, sans-serif; color:#42515E;">¿desea comprar nuestros productos?</h2>

    <?php if(isset($_SESSION['user'])){ ?>
    
                    
                    <a href="includes/carrito.php">
                        <button type="button" class="btn btn-danger" style="width:300px ; height:60px;">Comprar</button>
                    </a>

    <?php }else{?>
        <button type="button" class="btn btn-success"><a class="text-decoration-none text-white" href="sesion/login.php">DEBE ESTAR LOGEADO PARA PODER COMPRAR</a></button>
    <?php } ?>
    
</div>


<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>

<!--Footer-->
<?php include_once "includes/footer.php";?>

</html>