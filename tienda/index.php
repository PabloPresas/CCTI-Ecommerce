<?php 
    include("../php/conexion.php");
    include("../php/cantidadproducto.php");

    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }else{
        $filtro = "defecto";
    }
    
    if($filtro == "menor"){
        $consulta = "SELECT * FROM productos ORDER BY precio ASC";
    }else if($filtro == "mayor"){
        $consulta = "SELECT * FROM productos ORDER BY precio DESC";
    }else if($filtro == "nombre"){
        $consulta = "SELECT * FROM productos ORDER BY nombre ASC";
    }else if($filtro == "nuevos"){
        $consulta = "SELECT * FROM productos ORDER BY id DESC";
    }else{
        $consulta = "SELECT * FROM productos";
    }

    $resultado = mysqli_query($conexion, $consulta);
    $cantidad = mysqli_num_rows($resultado);
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
                    <a href="#"><li class="botones">TIENDA</li></a>
                    <a href="../contacto/"><li class="botones">CONTACTO</li></a>
                </ul>
            </div> 
        </nav> 

        <section id="tienda">
            <div id="info-tienda">
                <div class="datoinfo">
                    <h1>TIENDA</h1>
                    <p class="mostrando">Mostrando <?php echo $cantidad;?> de <?php echo $cantidad;?> productos</p>
                </div>
                <div class="datoinfo">
                    <form>
                        <select name="filtro" class="select-filtro" onchange="submit();">
                            <option>Ordenar por..</option>
                            <option value="menor" <?php if($filtro == "menor"){ ?> selected <?php } ?>>Menor precio</option>
                            <option value="mayor" <?php if($filtro == "mayor"){ ?> selected <?php } ?>>Mayor precio</option>
                            <option value="nombre" <?php if($filtro == "nombre"){ ?> selected <?php } ?>>Ordenar por nombre</option>
                            <option value="nuevos" <?php if($filtro == "nuevos"){ ?> selected <?php } ?>>Nuevos productos</option>
                        </select>
                    </form>
                </div>
            </div>
            <div id="productos-tienda">
            <?php 
                while($mostrar=mysqli_fetch_array($resultado)){
            ?>
                <a href="producto.php?id=<?php echo $mostrar['id']; ?>" class="item-produ">
                    <img src="../img/productos/<?php echo $mostrar['id']; ?>-1.jpg" alt="producto1" class="img-tienda">
                    <p class="titu-producto"><?php echo $mostrar['nombre']; ?></p>
                    <p class="precio-producto">$<?php echo $mostrar['precio']; ?></p>
                </a>
            <?php } ?>
            </div>
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
    </body>
</html>