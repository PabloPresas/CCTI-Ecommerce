<?php
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
            <form action="phpcpanel/agregarproducto.php" method="post" enctype="multipart/form-data" class="formu-editar animate__animated animate__shakeX">
                <div class="titu-editar">ALTA DE PRODUCTOS</div>

                <label class="label">Nombre del producto</label>
                <input type="text" name="nombre" placeholder="Producto" required>
                <label class="label">Precio</label>
                <input type="number" name="precio" placeholder="Precio del producto" required>
                <label class="label">Descripción</label>
                <textarea name="descripcion" placeholder="Agrega una descripción" required></textarea>
                <label class="label" for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="1" min="1" required>
                
                <label class="label" for="imagen"> <h222 class="titu-fotos">FOTOS DEL PRODUCTO:</h222><br>
                    <ul class="labelul">
                        <li>Tamaño y peso máximo 1000 x 1000 pixeles - 1MG</li>
                    </ul>    
                </label><br>

                <div class="custom-input-file">
                    <input type="file" name="imagen" id="imagen" accept=".jpg, .jpeg, .png">
                </div>
                <div class="custom-input-file">
                    <input type="file" name="imagendos" id="imagendos" accept=".jpg, .jpeg, .png">
                </div>
                <div class="custom-input-file">
                    <input type="file" name="imagentres" id="imagentres" accept=".jpg, .jpeg, .png">
                </div>
                <div class="custom-input-file">
                    <input type="file" name="imagencuatro" id="imagencuatro" accept=".jpg, .jpeg, .png">
                </div>
                <button type="submit" class="form-editar">AGREGAR PRODUCTO</button>
            </form>
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