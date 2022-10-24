<?php 
    session_start();

    $cantidadpro = 0;
    if(isset($_SESSION['carrito'])){
        $arreglocarrito = $_SESSION['carrito'];
        for($i=0;$i<count($arreglocarrito);$i++){
            $cantidadpro = $cantidadpro + ($arreglocarrito[$i]['cantidad']);
        }
    } 
   
?>