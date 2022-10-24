<?php

    if(isset($_GET['e'])){
      $error = $_GET['e'];
    }else{
      $error = 0;
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
    </head>
    <body>
        <nav>          
            <a href="../"><img src="../img/logo-negro.svg" alt="Violet Tienda Natural" class="logo-nav"></a>
            
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
                    <a href="../contacto/"><li class="botones">CONTACTO</li></a>
                </ul>
            </div> 
        </nav> 

        <section id="iniciarsesion">
            <form method="post" action="phpcpanel/iniciar.php">
                <img src="../img/logo-negro.svg" alt="logo" class="logo-ingresar">
                <div class="titu-ingresar">INGRESAR</div>
                
                <input name="usuario" type="text" placeholder="Usuario">
                <input name="clave" type="password" placeholder="Contraseña">
                <?php if($error == 1){ ?>
                <p class="cpanelerror">Datos Incorrectos</p>
                <?php } ?>
                <button type="submit">INGRESAR</button>
            </form>
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