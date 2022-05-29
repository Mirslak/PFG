
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Zona de Administrador</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- sweetalert2 -->
  <script src="../plugins/sweetalert2.all.min.js"></script>
  
</head>
<body style="background-image: url('../../../Imagenes/img-read/zonaAdmin-wall.png');">
    <br>
    <div id="bloqueo" class="card bg-transparent border-0 text-white" style="margin-top:10%;">
        <article class="card-body mx-auto"  style="background: rgba(74,91,99,0.3);">
            <h4 class="card-title mt-3 text-center">Contenido Bloqueado.</h4>
            <p class="text-center">Introduzca la contraseña para mostrar el contenido.</p>
            <form method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <div class="input-group">
                            <span class="input-group-text ms-5" id="basic-addon1">
                                <span><i class="fa fa-lock"></i></span>
                            </span>
                            <input type="password" name="passwordC" id="passwordC" class="form-control " placeholder="*********" alt="complete">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group ms-4">
                	<button type="submit" name="codigo" class="btn btn-primary btn-block"> Mandar Código</button>
			<button class="btn btn-primary btn-block ms-3"> <a style="color: white; text-decoration:none;" href="../../index.php">Página Principal</a></button>
                </div>   
            </form>
        </article>
    </div>
</body>
</html>

<?php
if(isset($_POST['codigo'])){

//Recogemos la contraseña introducida en el formulario
$password = $_POST["passwordC"];

//Si la contraseña no coincide con el código echaremos al intruso. Si es correcto se mostrará el login del admin
if ($password != 'Admin$17') { 
	echo "<script>alert('Código incorrecto, echando de la página.')</script>";
	echo "<script>window.open('../../index.php','_self')</script>";
	}else{
?>
    <style>#bloqueo{display: none;}</style>
        <div align="center">
            <div class="container text-white m-5 p-5 "  style="background: rgba(74,91,99,0.3); max-width: 500px ;" align="center">
                <div class="m-5">
                    <img  src="../../../Imagenes/img-read/Distribuciones 2.png" alt="" width="150" >
                </div>

                <h3 class="mb-3">INICIAR SESIÓN EN ZONA ADMINISTRADOR</h3>
                <form action = "comprobarAdmin.php" id="formLogin" method="post" class="needs-validationC ms-5 me-5">
                    <div class="input-group mb-3">    
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </span>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Correo Electrónico" autofocus required>
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

                        <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required alt="complete">
                        <div class="invalid-feedback">
                        la contraseña.
                        </div>
                    </div>
                    
                    <br>
                   
                    <input name="login" value="INICIAR SESIÓN" type="submit" class="btn text-white p-3 mb-" style="background-color: #42515E;" alt="complete">
                    
                </form>
            </div>
        </div>
	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="../../js/validarLoginAdmin.js"></script>
<?php 
	}
} 