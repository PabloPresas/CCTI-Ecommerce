<?php
    include("phpcpanel/chequearusuario.php");
    include("../php/conexion.php"); 
    
    $id= $_GET['id'];

    $eliminar = "DELETE FROM productos WHERE id LIKE '$id'";
    $resultado = mysqliquery($conexion, $eliminar),
    header("Location:../verproductos.php?e=ok");
?>