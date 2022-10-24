<?php
    include("phpcpanel/chequearusuario.php");
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
    </head>
    <body>
        <nav class="navscroll navcpanel">
            <div class="user"> 
                USUARIO: <?php echo $useradmin;?>
                <a href="../php/cerrarsesion.php"> - CERRAR SESIÓN</a>
            </div>
            <a href="#"><img src="../img/logo-negro.svg" alt="logo" class="logo-nav"></a>

            <input id="btn-menu" type="checkbox">
            <label for="btn-menu" id="btn-menu2">
                <div class="linea1"></div>
                <div class="linea1 apagar"></div>
                <div class="linea2"></div>
            </label>

            <div id="menu">
                <ul>
                    <a href="verventas.php"><li class="botones">VENTAS</li></a>
                    <a href="verclientes.php"><li class="botones">CLIENTES</li></a>
                    <a href="verproductos.php"><li class="botones">PRODUTOS</li></a>
                </ul>
            </div>
        </nav>
       
        <section id="sistema">
            <div class="titu-cpanel">CPANEL VIOLET</div>
            <a href="verventas.php" class="btn-sistema">VER<br>VENTAS</a>
            <a href="verclientes.php" class="btn-sistema">VER<br>CLIENTES</a>

            <a href="verproductos.php" class="btn-sistema">EDITAR<br>PRODUCTOS</a>
            <a href="agregarproductos.php" class="btn-sistema">AGREGAR<br>PRODUCTOS</a>
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