<?php 
    session_start(); //mantengo la session iniciada y la llevo entre todos mis archivos
    include("../php/conexion.php");

    //pregunto si el carrito ya tiene algo añadido
    if(isset($_SESSION['carrito'])){
        //lee si trae un id por post
        if(isset($_POST['id'])){
            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            $cantidad = $_POST['cantidad'];

            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['id'] == $_POST['id']){
                    $encontro = true;
                    $numero = $i;
                }
            }
            if($encontro == true){
                //significa que el producto ya estaba añadido y sumo la cantidad a la que ya tenia
                $arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+$cantidad;
                $_SESSION['carrito']=$arreglo; //guardo el cambio
            }else{
                //significa que ya tenia productos añadidos pero trae uno nuevo
                $result = $conexion->query('SELECT * FROM productos WHERE id='.$_POST['id']);
                $fila = mysqli_fetch_row($result);
                $nombre = $fila[1];
                $precio = $fila[3];

                $arregloNuevo = array(
                    'id'=>$_POST['id'],
                    'nombre'=>$nombre,
                    'precio'=>$precio,
                    'cantidad'=>$_POST['cantidad']
                );
                //uno el array viejo (carrito con productos) y el nuevo array
                array_push($arreglo, $arregloNuevo);
                $_SESSION['carrito']=$arreglo; //guardo el cambio
            }
        }
    }else{
        //lee si no tiene nada en el carrito
        if(isset($_POST['id'])){
            //pregunta si esta agregando un articulo al carrito
            $result = $conexion->query('SELECT * FROM productos WHERE id='.$_POST['id']);
            $fila = mysqli_fetch_row($result);
            $nombre = $fila[1];
            $precio = $fila[3];

            $arreglo[] = array(
                'id'=>$_POST['id'],
                'nombre'=>$nombre,
                'precio'=>$precio,
                'cantidad'=>$_POST['cantidad']
            );
            $_SESSION['carrito']=$arreglo;
        }
    }

    $cantidadpro = 0;
    if(isset($_SESSION['carrito'])){
        $arreglocarrito = $_SESSION['carrito'];
        for($i=0;$i<count($arreglocarrito);$i++){
            $cantidadpro = $cantidadpro + ($arreglocarrito[$i]['cantidad']);
        }
    } 

?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Carrito - Violet - Productos Naturales</title>
        <link rel="icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
       
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
        <meta name="description" content="Tienda de productos naturales de bajo impacto ambiental">
        <meta name="keywords" content="Productos, naturales, eco, ecología, medio ambiente, dietetica, veggie, zero waste">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>
        <nav>          
            <a href="../"><img src="../img/logo-negro.svg" alt="Productos Naturales" class="logo-nav"></a>
            <a href="#" id="carrito"><img src="../img/iconos/carrito-de-compras.svg" alt="buscar" class="btn-carrito"><p class="canti">(<?php echo $cantidadpro;?>)</p></a>
            
            <input id="btn-menu" type="checkbox">
            <label for="btn-menu" id="btn-menu2">
                <div class="linea1"></div>
                <div class="linea1 apagar"></div>
                <div class="linea2"></div>
            </label>
            <div id="menu">
                <ul>
                    <a href="../"><li class="botones">INICIO</li></a>
                    <a href="index.php"><li class="botones">TIENDA</li></a>
                    <a href="../contacto/"><li class="botones">CONTACTO</li></a>
                </ul>
            </div> 
        </nav> 
           
        <section class="carrito">
            <div class="listaproductos">
                <table>
                    <tr>
                        <td class="titu-td"></td>
                        <td class="titu-td">Producto</td>
                        <td class="titu-td">Precio</td>
                        <td class="titu-td">Cantidad</td>
                        <td class="titu-td">Subtotal</td>
                        <td class="titu-td"></td>
                    </tr>
                    <?php
                        $total = 0;
                        if(isset($_SESSION['carrito'])){
                            $arreglocarrito = $_SESSION['carrito'];
                            for($i=0;$i<count($arreglocarrito);$i++){
                                $total = $total + ($arreglocarrito[$i]['cantidad'] * $arreglocarrito[$i]['precio']);
                    ?>   
                    <tr>
                        <td class="cnt-imgcarrito"><img src="../img/productos/<?php echo $arreglocarrito[$i]['id'];?>-1.jpg" class="img-carrito"></td>
                        <td><?php echo $arreglocarrito[$i]['nombre'];?></td>
                        <td><?php echo $arreglocarrito[$i]['precio'];?></td>
                        <td>
                            <form class="cantidadresta" action="carrito/restar.php" method="post">
                                <button type="submit" class="sumaresta" name="id" value="<?php echo $arreglocarrito[$i]['id'];?>">-</button>
                            </form>
                            <div class="cantidadcarrito">
                                <?php echo $arreglocarrito[$i]['cantidad'];?>
                            </div>    
                            <form class="cantidadresta" action="carrito/agregar.php" method="post">
                                <button type="submit" class="sumaresta" name="id" value="<?php echo $arreglocarrito[$i]['id'];?>">+</button>
                            </form>
                        </td>
                        <td>$<?php $subtotal = ($arreglocarrito[$i]['precio'] * $arreglocarrito[$i]['cantidad']);
                                echo $subtotal2=number_format($subtotal, 2, ',', '');?></td>
                        <td><a href="carrito/eliminar.php?id=<?php echo $arreglocarrito[$i]['id'];?>"><img src="../img/iconos/eliminar.svg" class="btn-eliminar"></a></td>
                    </tr> 
                    <?php } } ?>
                </table>
                <table>
                    <tr><td class="titu-td">Total: $<?php echo $total2=number_format($total, 2, ',', '');?></td></tr>
                </table>
            </div> 
        
            <form method="post" action="finalizarcompra.php">
                <?php if(isset($_SESSION['carrito'])){ ?>
                    <button type="submit" class="btn-finalizar">FINALIZAR COMPRA</button>
                    <a href="index.php" class="btn-continuar">Continuar comprando</a>
                <?php }else{ ?>
                    <a href="index.php" class="btn-finalizar">IR A LA TIENDA</a>
                <?php } ?>
            </form>
        </section>  

        <footer>
            <img src="../img/logo-negro.svg" alt="MuuG Ingenieros del té" class="logo-footer">
            
            <a href="https://www.instagram.com/perfil/" target="_blank">
                <img src="../img/iconos/instagram.svg" class="iconos-footer" alt="instagram">
            </a>
            <a href="https://wa.me/5491122223333" target="_blank">
                <img src="../img/iconos/whatsapp.svg" class="iconos-footer" alt="whatsapp">
            </a>
            <a href="../contacto/">
                <img src="../img/iconos/mensaje.svg" class="iconos-footer" alt="contacto">
            </a>
            <p class="txt-footer">Violet - Productos Naturales. Buenos Aires, Argentina.</p>
        </footer>
    </body>
</html>