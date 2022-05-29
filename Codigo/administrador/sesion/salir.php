<?php
    //Traemos la sesión anterior
    session_start();

    //Destruimos la sesión para que el usuario tenga que loguearse de nuevo
    session_destroy();

    echo "<script>window.open('login.php','_self')</script>";
?>