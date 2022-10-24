<?php
    include("../../php/conexion.php");
    session_start(); 

    $id=$_POST['id'];
    
    $arreglo=$_SESSION['carrito'];

    if(isset($_SESSION['carrito'])){
        //busca el producto en el carrito
        if(isset($_POST['id'])){
            $arreglo=$_SESSION['carrito'];
            $encontro=false;
            $numero = 0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['id'] == $_POST['id']){
                    $encontro=true;
                    $numero = $i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] - 1;
                if($arreglo[$numero]['cantidad'] == 0){
                    //si la cantidad del producto llega a 0
                    //mismo codigo de archivo eliminarproducto.php
                    for($i=0;$i<count($arreglo);$i++){
                        if($arreglo[$i]['id'] != $id){
                            $arregloNuevo[] = array(
                                    'id'=>$arreglo[$i]['id'],
                                    'nombre'=>$arreglo[$i]['nombre'],
                                    'precio'=>$arreglo[$i]['precio'],
                                    'cantidad'=>$arreglo[$i]['cantidad']
                            );
                        }
                    }
                    if(isset($arregloNuevo)){
                        $_SESSION['carrito']=$arregloNuevo;
                    }else{
                        unset($_SESSION['carrito']);
                    }
                }else{
                    $_SESSION['carrito']=$arreglo;
                }
            }
        }
    }
header("Location:../carrito.php");
?>