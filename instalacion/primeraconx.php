<?php
$servidor = $_SERVER['SERVER_ADDR'];
$usuario = "debianDB";
$password = "debianDB";

try{
  $conexion = mysqli_connect($servidor, $usuario, $password);
}catch(Exception $e){
  echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>