<?php 
    include("../php/cantidadproducto.php");
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Tienda - Violet - Productos Naturales</title>
        <link rel="icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
       
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
        <meta name="description" content="Tienda de productos naturales de bajo impacto ambiental">
        <meta name="keywords" content="Productos, naturales, eco, ecología, medio ambiente, dietetica, veggie, zero waste">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
    <body>
        <nav>          
            <a href="../"><img src="../img/logo-negro.svg" alt="Productos Naturales" class="logo-nav"></a>
            <a href="../tienda/carrito.php" id="carrito"><img src="../img/iconos/carrito-de-compras.svg" alt="buscar" class="btn-carrito"><p class="canti">(<?php echo $cantidadpro;?>)</p></a>
            
            <input id="btn-menu" type="checkbox">
            <label for="btn-menu" id="btn-menu2">
                <div class="linea1"></div>
                <div class="linea1 apagar"></div>
                <div class="linea2"></div>
            </label>
            <div id="menu">
                <ul>
                    <a href="../"><li class="botones">INICIO</li></a>
                    <a href="../tienda/"><li class="botones">TIENDA</li></a>
                    <a href="#"><li class="botones">CONTACTO</li></a>
                </ul>
            </div> 
        </nav> 

        <section id="contacto">
            <form method="post" action="../php/mailcontacto.php" id="formulario">
                <input type="text" name="nombre" id="nombre" maxlength="50" placeholder="Ingresa tu nombre" required onchange="quitar()">

                <input type="email" name="correo" id="correo" placeholder="Ingresa tu correo" required onchange="quitar()">
                <div id="faltacorreo" class="falta" style="display:none;">Completa tu correo</div>

                <textarea name="mensaje" id="mensaje" placeholder="Dejanos un mensaje"></textarea>
                
                <div id="btn" onclick="validar()">ENVIAR</div>
            </form>
        </section>

        <footer>
            <img src="../img/logo-negro.svg" alt="Violet - Productos naturales" class="logo-footer">
            
            <a href="https://www.instagram.com/perfil/" target="_blank">
                <img src="../img/iconos/instagram.svg" class="iconos-footer" alt="instagram">
            </a>
            <a href="https://wa.me/5491122223333" target="_blank">
                <img src="../img/iconos/whatsapp.svg" class="iconos-footer" alt="whatsapp">
            </a>
            <a href="../contacto/">
                <img src="../img/iconos/mensaje.svg" class="iconos-footer" alt="contacto">
            </a>
            
            <p class="txt-footer">Violet - Productos naturales. Buenos Aires, Argentina.</p>
        </footer>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        
        <script type="text/javascript" src="../js/validar.js"></script>
    </body>
</html>