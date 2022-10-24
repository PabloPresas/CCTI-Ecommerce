<?php
    include("phpcpanel/chequearusuario.php");
    include("../php/conexion.php");    
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Cpanel Violet Tienda Natural</title>
        <link rel="icon" href="../img/favicon.png">    
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Comercializamos produtos inovadores e com eficiência comprovada na prática para uso veterinário. Somos especializados em probiótios, prebióticos e simbióticos naturais para uso em animais.">
        <meta name="keywords" content="Diarreia, potros, competição, engordar cavalo, aumento de performance, ganho de peso, estimulante do crescimento, melhorar a imunidade, desenvolvimento de potros, prevenir cólica, melhorar o pelo, melhorar o casco, endurecer o casco, ganhar exposição, ganhar prova">

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
                    <a href="verventas.php"><li class="botones">VENTAS</li></a>
                    <a href="verclientes.php"><li class="botones">CLIENTES</li></a>
                    <a href="verproductos.php"><li class="botones">PRODUTOS</li></a>
                </ul>
            </div>
        </nav>
        
        <section id="sistema">
            <div class="listadeproductos">
                <table class="usuariostabla">
                    <tr>
                        <td class="titu-td">Nombre</td>
                        <td class="titu-td">Telefono</td>
                        <td class="titu-td">Email</td>
                        <td class="titu-td">Dirección</td>
                        <td class="titu-td">Localidad</td>
                        <td class="titu-td">Provincia</td>
                    </tr>
                    <?php
                        $consulta = "SELECT * FROM clientes";
                        $resultado = mysqli_query($conexion, $consulta);
                        while($mostrar=mysqli_fetch_array($resultado)){
    
                    ?>
                    <tr> 
                        <td><?php echo $mostrar['nombre'];?> <?php echo $mostrar['apellido'];?></td>
                        <td><?php echo $mostrar['telefono'];?></td>
                        <td><?php echo $mostrar['correo'];?></td>
                        <td><?php echo $mostrar['direccion'];?></td>
                        <td><?php echo $mostrar['localidad'];?></td>
                        <td><?php echo $mostrar['provincia'];?></td>
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