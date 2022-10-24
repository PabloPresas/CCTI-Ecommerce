<?php 
    include("../../php/conexion.php");
    session_start();

    $id=$_POST['id'];
    $arreglo = $_SESSION['carrito'];

    $consulta = "SELECT * FROM productos WHERE id LIKE $id";
    $resultado = mysqli_query($conexion, $consulta);
    while($mostrar=mysqli_fetch_array($resultado)){
        $stock = $mostrar['stock'];
    }
    if(isset($_SESSION['carrito'])){
        //busca el producto
        if(isset($_POST['id'])){
            $encontro = false;
            $numero = 0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['id'] == $_POST['id']){
                    $encontro = true;
                    $numero = $i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] + 1;

                if($arreglo[$numero]['cantidad'] > $stock){
                    $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] - 1;
                }else{
                    $_SESSION['carrito']=$arreglo;
                }
            }
        }
    }
    header("Location:../carrito.php");
?>