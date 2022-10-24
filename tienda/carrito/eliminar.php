<?php 
    session_start();

    $id=$_GET['id'];
    $arreglocarrito = $_SESSION['carrito'];

    for($i=0;$i<count($arreglocarrito);$i++){
        if($arreglocarrito[$i]['id'] != $id){
            $arreglonuevo[] = array(
                'id'=>$arreglocarrito[$i]['id'],
                'nombre'=>$arreglocarrito[$i]['nombre'],
                'precio'=>$arreglocarrito[$i]['precio'],
                'cantidad'=>$arreglocarrito[$i]['cantidad']
            );
        }
    }
    if(isset($arreglonuevo)){
        $_SESSION['carrito']=$arreglonuevo;
    }else{
        unset($_SESSION['carrito']);
    }
    header("Location:../carrito.php");
?>