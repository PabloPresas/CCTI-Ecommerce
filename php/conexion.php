<?php 
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";

    $conexion = mysqli_connect($servidor, $usuario, $clave) or die ("No se conecto al servidor");

    $db = "proyectofinal";

    $conexiondb = mysqli_select_db($conexion, $db) or die ("No se conecto a la base");
?>