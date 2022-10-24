<?php 
    include("../php/conexion.php");
    include("../php/cantidadproducto.php");

    $id = $_GET['id'];

    $consulta = "SELECT * FROM productos WHERE id LIKE $id";
    $resultado = mysqli_query($conexion, $consulta);
    while($mostrar=mysqli_fetch_array($resultado)){

?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title><?php echo $mostrar['nombre'];?> - Violet - Productos Naturales</title>
        <link rel="icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
       
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
        <meta name="description" content="Tienda de productos naturales de bajo impacto ambiental">
        <meta name="keywords" content="Productos, naturales, eco, ecología, medio ambiente, dietetica, veggie, zero waste">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
        <style>
            #img1:checked ~ .fotogrande{
                background-image: url(../img/productos/<?php echo $id;?>-1.jpg);}
            #img2:checked ~ .fotogrande{
                background-image: url(../img/productos/<?php echo $id;?>-2.jpg);}
            #img3:checked ~ .fotogrande{
                background-image: url(../img/productos/<?php echo $id;?>-3.jpg);}
            #img4:checked ~ .fotogrande{
                background-image: url(../img/productos/<?php echo $id;?>-4.jpg);}
        </style>
    
    </head>
    <body>
        <nav>          
            <a href="../"><img src="../img/logo-negro.svg" alt="Productos Naturales" class="logo-nav"></a>
            <a href="carrito.php" id="carrito"><img src="../img/iconos/carrito-de-compras.svg" alt="buscar" class="btn-carrito"><p class="canti">(<?php echo $cantidadpro;?>)</p></a>
            
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

        <main>
            <div id="foto-producto">
                <button id="izq" class="flecha"> < </button>
                <button id="dere" class="flecha"> > </button>

                <input type="radio" name="img" id="img1" checked>
                <input type="radio" name="img" id="img2">
                <input type="radio" name="img" id="img3">
                <input type="radio" name="img" id="img4">
                
                <div class="fotogrande"></div>

                <label for="img1"><img src="../img/productos/<?php echo $id;?>-1.jpg" alt="<?php echo $mostrar['nombre'];?>" class="img-muestra"></label>
                <label for="img2"><img src="../img/productos/<?php echo $id;?>-2.jpg" alt="<?php echo $mostrar['nombre'];?>" class="img-muestra"></label>
                <label for="img3"><img src="../img/productos/<?php echo $id;?>-3.jpg" alt="<?php echo $mostrar['nombre'];?>" class="img-muestra"></label>
                <label for="img4"><img src="../img/productos/<?php echo $id;?>-4.jpg" alt="<?php echo $mostrar['nombre'];?>" class="img-muestra"></label>

            </div>
            <div id="info-producto">
                <p class="nombre-produ"><?php echo $mostrar['nombre'];?></p>
                <p class="descripcion-produ"><?php echo $mostrar['descripcion'];?></p>
                <p class="precio-produ">Precio: $<?php echo $mostrar['precio'];?></p>
                <form class="agregarcarrito" action="carrito.php" method="post">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <?php 
                          $stock = $mostrar['stock'];
                          if($stock > 0){ ?>
                            <input type="number" value="1" name="cantidad" min="1" max="<?php echo $stock;?>">
                            <button type="submit" class="btn-agregar">Agregar al carrito</button>
                    <?php }else{ ?>
                            <p class="sinstock">SIN STOCK DISPONIBLE</p>
                    <?php } ?>
                </form>
            </div>
        </main>

        <?php } ?>

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

        <script type="text/javascript" src="../js/carrusel.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>