<?php
    include("phpcpanel/chequearusuario.php");
    include("../php/conexion.php");
    include("ventas/estadopago.php");
    include("ventas/estadoenvio.php");
    include("ventas/detalleenvio.php");
    include("ventas/detalleventa.php");

    if(isset($_GET['p'])){
      $p = $_GET['p'];
    }else{
      $p = "";
    }



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
    function cerrarestadopago() {
        document.getElementById('estadopago').style.display = 'none';
    }

    function cerrardetalleenvio() {
        document.getElementById('detalleenvio').style.display = 'none';
    }

    function cerrarestadoenvio() {
        document.getElementById('estadoentrega').style.display = 'none';
    }

    function cerrardetalleventa() {
        document.getElementById('detalleventa').style.display = 'none';
    }

    function mensaje() {
        var pago = <?php echo $p; ?>
        if (pago == "1") {
            alert("Estado de pago editado con exito");
        }
        if (pago == "2") {
            alert("Estado de pago editado con exito");
        }

    }
    window onload = mensaje;
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
                <a href="#">
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
        <div class="listadeusuarios">
            <table class="tablaventas">
                <tr>
                    <td class="titu-td dos">FECHA</td>
                    <td class="titu-td dos">NOMBRE</td>
                    <td class="titu-td dos">DETALLER DE<br>LA COMPRA</td>
                    <td class="titu-td dos">TOTAL</td>
                    <td class="titu-td dos">MEDIO DE<br>PAGO</td>
                    <td class="titu-td dos">ENVIO</td>
                    <td class="titu-td dos">DATOS<br>DE ENVIO</td>
                    <td class="titu-td dos">NOTAS</td>
                    <td class="titu-td dos">ESTADO <br>PAGO</td>
                    <td class="titu-td dos">ESTADO <br>ENTREGA</td>
                </tr>
                <?php 
                        $consulta = "SELECT * FROM ventas ORDER BY fecha DESC";
                        $resultado = mysqli_query($conexion, $consulta);
                        while($mostrar=mysqli_fetch_array($resultado)){

                          $idcliente = $mostrar['idcliente'];
                          $resultcliente = $conexion->query('SELECT * FROM clientes WHERE idcliente='.$idcliente);
                          $filascliente = mysqli_fetch_array($resultcliente);
                          $nombre = $filascliente[1];
                          $apellido = $filascliente[2];
                          $correo = $filascliente[3];
                        ?>
                <tr>
                    <td><?php echo $mostrar['fecha'];
                        $fechaventa = date("d/m/Y", strtotime($mostrar['fecha'])); ?></td>
                    <td><?php echo $nombre. " " . $apellido;?></td>
                    <td>
                        <form onclick="submit()" method="get">
                            <input type="hidden" name="conteventa" value="<?php echo $mostrar['idventa'];?>">
                            <img src="../img/iconos/recibo.png" alt="cuentas" class="btn-editar">
                        </form>
                    </td>
                    <td><?php echo $mostrar['total'];?></td>
                    <td><?php echo $mostrar['formapago'];?></td>
                    <td><?php echo $mostrar['formaenvio'];?></td>
                    <td>
                        <form onclick="submit()" method="get">
                            <input type="hidden" name="idcliente" value="<?php echo $mostrar['idcliente'];?>">
                            <input type="hidden" name="formaenvio" value="<?php echo $mostrar['formaenvio'];?>">
                            <img src="../img/iconos/envio.png" alt="cuentas" class="btn-editar">
                        </form>
                    </td>
                    <td><?php echo $mostrar['notas'];?></td>
                    <td>
                        <form onclick="submit()" method="get">
                            <input type="hidden" name="estadopago" value="<?php echo $mostrar['idventa'];?>">
                            <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                            <p class="editar"><?php echo $mostrar['estadopago'];?></p>
                            <img src="../img/iconos/cuentas.png" alt="cuentas" class="btn-editar">
                        </form>
                    </td>
                    <td>
                        <form onclick="submit()" method="get">
                            <input type="hidden" name="estadoenvio" value="<?php echo $mostrar['idventa'];?>">
                            <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                            <p class="editar"><?php echo $mostrar['estadoentrega'];?></p>
                            <img src="../img/iconos/cuentas.png" alt="cuentas" class="btn-editar">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <a href="cpanel.php" class="volversistema">VOLVER A LA HOME</a>
    </section>

    <footer>
        <img src="../img/logo-negro.svg" alt="Violet Tienda Natural" class="logo-footer">

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