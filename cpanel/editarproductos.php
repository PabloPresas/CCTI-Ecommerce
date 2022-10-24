<?php
    include("phpcpanel/chequearusuario.php");
    include("../php/conexion.php"); 
    
    $id = $_GET['id'];

    $consulta = "SELECT * FROM productos WHERE id LIKE '$id'";
    $resultado = mysqli_query($conexion, $consulta);
    while($mostrar=mysqli_fetch_array($resultado)){

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Cpanel - Violet Tienda Natural</title>
    <link rel="icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
        content="Comercializamos produtos inovadores e com eficiência comprovada na prática para uso veterinário. Somos especializados em probiótios, prebióticos e simbióticos naturais para uso em animais.">
    <meta name="keywords"
        content="Diarreia, potros, competição, engordar cavalo, aumento de performance, ganho de peso, estimulante do crescimento, melhorar a imunidade, desenvolvimento de potros, prevenir cólica, melhorar o pelo, melhorar o casco, endurecer o casco, ganhar exposição, ganhar prova">
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

    <section id="sistema">
        <form action="phpcpanel/editar.php" method="post" enctype="multipart/form-data"
            class="formu-editar animate__animated animate__shakeX">
            <div class="titu-editar">EDITAR PRODUCTO</div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label class="label">Nombre del producto:</label>
            <input type="text" name="nombre" value="<?php echo $mostrar['nombre']; ?>" required>
            <label class="label">Precio:</label>
            <input type="number" name="precio" value="<?php echo $mostrar['precio']; ?>" required>
            <label class="label">Stock:</label>
            <input type="number" name="stock" value="<?php echo $mostrar['stock']; ?>" required>
            <label class="label">Descripción:</label>
            <textarea name="descripcion" required><?php echo $mostrar['descripcion']; ?></textarea>


            <label class="label" for="imagen">
                <h222 class="titu-fotos">FOTOS DEL PRODUCTO:</h222><br>
                <ul class="labelul">
                    <li>Tamaño y peso máximo 1000 x 1000 pixeles - 3MB</li>
                    <li>Si modificaste el <b>nombre del producto</b>, deberás volver a subir todas las fotos de nuevo.
                    </li>
                </ul>
            </label><br>

            <div class="custom-input-file">
                <input type="file" name="imagen" id="imagen">
            </div>
            <div class="custom-input-file">
                <input type="file" name="imagendos" id="imagendos">
            </div>
            <div class="custom-input-file">
                <input type="file" name="imagentres" id="imagentres">
            </div>
            <div class="custom-input-file">
                <input type="file" name="imagencuatro" id="imagencuatro">
            </div>
            <button type="submit" class="form-editar">EDITAR PRODUCTO</button>
        </form>
        <?php } ?>

        <a href="cpanel.php" class="volversistema">VOLVER A LA HOME</a>
    </section>
</body>

</html>