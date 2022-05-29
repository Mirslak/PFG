<?php
session_start();
session_destroy();
echo"<script>alert('Sesión cerrada')</script>";
echo"<script>window.open('../index.php','_self')</script>";
?>