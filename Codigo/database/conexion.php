<?php
try{
$conexion = mysqli_connect('192.168.1.169', 'debianDB', 'debianDB', 'Carbonicas');
}catch(Exception $e){
echo 'Ocurrió algo con la base de datos: ' . $e->getMessage();
}
?>
