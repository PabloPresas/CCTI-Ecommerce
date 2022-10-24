<?php
    include("phpcpanel/chequearusuario.php");
    include("../php/conexion.php"); 

    if(isset($_GET['a'])){
       $a= $_GET['a'];
    }else{$a = "";
    } // Se lee cuando se agrega un producto.

    if(isset($_GET['e'])){
        $e= $_GET['e'];
    }else{$e = "";
    } // Se lee cuando se elimina un producto.

    if(isset($_GET['m'])){
        $m= $_GET['m'];
    }else{$m = "";
    } // Se lee cuando se edita un producto.
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Cpanel Violet - Tienda Natural</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">

    <meta charset="utf-8">
    <meta name="description" content="Tienda de productos naturales de bajo impacto ambiental">
    <meta name="keywords" content="Productos, naturales, eco, ecología, medio ambiente, dietetica, veggie, zero waste">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script>
    function mensaje() {
        var agregado = "<?php echo $a;?>";
        var eliminado = "<?php echo $e;?>";
        var editado = "<?php echo $m;?>";

        if (agregado == "ok") {
            alert("Producto agregado con exito");
        }

        if (eliminado == "ok") {
            alert("Producto eliminado con exito");
        }

        if (editado == "ok") {
            alert("Producto editaco con exito");
        }
    }
    window.onload = mensaje;
    </script>

</head>

<body>
    <nav class="navscroll navcpanel">
        <div class="user">
            USUARIO: <?php echo $useradmin;?>
            <a href="../php/cerrarsesion.php"> - CERRAR SESIÓN</a>
        </div>
        <a href="cpanel.php"><img src="../img/logo-negro.svg" alt="logo" class="logo-nav"></a>

        <input id="btn-menu" type="checkbox">
        <label for="btn-menu" id="btn-menu2">
            <div class="linea1"></div>
            <div class="linea1 apagar"></div>
            <div class="linea2"></div>
        </label>

        <div id="menu">
            <ul>
                <a href="verventas.php">
                    <li class="botones">VENTAS</li>
                </a>
                <a href="verclientes.php">
                    <li class="botones">CLIENTES</li>
                </a>
                <a href="verproductos.php">
                    <li class="botones">PRODUTOS</li>
                </a>
            </ul>
        </div>
    </nav>

    <section id="sistema2">
        <div class="listadeproductos">
            <table>
                <tr>
                    <td class="titu-td dos">Nombre</td>
                    <td class="titu-td dos">Precio</td>
                    <td class="titu-td dos">Descripción</td>
                    <td class="titu-td dos">Stock</td>
                    <td class="titu-td dos">Foto 1</td>
                    <td class="titu-td dos">Foto 2</td>
                    <td class="titu-td dos">Foto 3</td>
                    <td class="titu-td dos">Foto 4</td>
                    <td class="titu-td dos">Editar</td>
                    <td class="titu-td dos">Eliminar</td>
                </tr>
                <?php                       
                          $consulta = "SELECT * FROM productos";
                          $resultado = mysqli_query($conexion, $consulta);
                          while($mostrar=mysqli_fetch_array($resultado)){
                      ?>

                <tr>
                    <td><?php echo $mostrar['nombre'];?></td>
                    <td><?php echo $mostrar['precio'];?></td>
                    <td style="width: 100%; height: 100px; float:left; overflow-Y: scroll;">
                        <?php echo $mostrar['descripcion'];?></td>
                    <td><?php echo $mostrar['stock'];?></td>
                    <td><img src="../img/productos/<?php echo $mostrar['id'];?>-1.jpg" width="100px;"></td>
                    <td><img src="../img/productos/<?php echo $mostrar['id'];?>-2.jpg" width="100px;"></td>
                    <td><img src="../img/productos/<?php echo $mostrar['id'];?>-3.jpg" width="100px;"></td>
                    <td><img src="../img/productos/<?php echo $mostrar['id'];?>-4.jpg" width="100px;"></td>
                    <td><a href="editarproductos.php?id=<?php echo $mostrar['id'];?>"><img
                                src="../img/iconos/editar.svg" class="btn-td"></a></td>
                    <td><a href="phpcpanel/eliminarprodu.php?id=<?php echo $mostrar['id'];?>"><img
                                src="../img/iconos/eliminar.svg" class="btn-td"></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <a href="cpanel.php" class="volversistema">VOLVER A LA HOME</a>
    </section>


    <footer>
        <img src="../img/logo-negro.svg" alt="Violet - Tienda Natural" class="logo-footer">

        <a href="https://www.instagram.com/perfil/" target="_blank">
            <img src="../img/iconos/instagram.svg" class="iconos-footer" alt="instagram">
        </a>
        <a href="https://wa.me/5491122223333" target="_blank">
            <img src="../img/iconos/whatsapp.svg" class="iconos-footer" alt="whatsapp">
        </a>
        <a href="../contacto/">
            <img src="../img/iconos/mensaje.svg" class="iconos-footer" alt="contacto">
        </a>
        <p class="txt-footer">Violet - Tienda Natural. Buenos Aires, Argentina.</p>
    </footer>
</body>

</html>