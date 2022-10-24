<?php 
    include("../php/conexion.php");
    include("../php/cantidadproducto.php");
    
    $total=0;
    if(isset($_SESSION['carrito'])){
        $arregloCarrito = $_SESSION['carrito'];
        for($i=0;$i<count($arregloCarrito);$i++){
            $total = $total + ($arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad']);
        }

    // SDK de Mercado Pago
    require __DIR__ .  '../../extensiones/vendor/autoload.php';
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('TEST-161002425725812-061122-9924603d7fd0007a4620487de2f27fc8-83326780');

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi compra en Violet';
    $item->quantity = 1;
    $item->unit_price = $total;
    $preference->items = array($item);
    $preference->save();
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Finalizar Compra - Violet - Productos Naturales</title>
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

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
           
    <div id="formulario">
        <form method="post" action="carrito/finalizar.php" id="validarformu">
            <div class="datoscliente"> 
                <h1>Datos de facturación</h1>
                <div class="ordennom">
                    <label for="nombre">Nombre<h22>*</h22></label>
                    <input type="text" name="nombre" id="nombre" onchange="quitar()">
                        
                    <label for="apellido">Apellido<h22>*</h22></label>
                    <input type="text" name="apellido" id="apellido" onchange="quitar()">
                </div>
                <div class="ordennom">
                    <label for="correo">Email<h22>*</h22></label>
                    <input type="email" name="correo" id="correo" onchange="quitar()">
                            
                    <label for="telefono">WhatsApp<h22>*</h22></label>
                    <input type="number" name="telefono" id="telefono" onchange="quitar()">
                </div>
            </div>

            <div class="datoscliente"> 
                <label for="notas"><h1>Notas del pedido (opcional)</h1></label>
                <textarea id="notas" name="notas" placeholder="Agregue notas a tu pedido"></textarea>
            </div>

            <div class="datoscliente">
                <h1>Formas de envio</h1>
                <p class="txt-finalizar">Seleccione un método de envio</p>
                <div class="formularioenvio">
                    <input type="radio" name="formaenvio" value="envio" id="envio">
                    <label for="envio" id="labelenvio">Quiero envio</label>

                    <input type="radio" name="formaenvio" value="coordinar" id="coordi">
                    <label for="coordi" id="labelcoordi">Coordinar con el vendedor</label>
                    
                    <div class="quiereenvio">
                        <select id="provincia" name="provincia" class="quieroenvioselect">
                            <option value="">Seleccionar una Provincia</option>
                            <option value="Buenos Aires">BUENOS AIRES</option>
                            <option value="Catamarca">CATAMARCA</option>
                            <option value="Chaco">CHACO</option>
                            <option value="Chubut">CHUBUT</option>
                            <option value="CABA">CIUDAD AUTONOMA DE Bs As</option>
                            <option value="Cordoba">CORDOBA</option>
                            <option value="Corrientes">CORRIENTES</option>
                            <option value="Entre Rios">ENTRE RIOS</option>
                            <option value="Formosa">FORMOSA</option>
                            <option value="Jujuy">JUJUY</option>
                            <option value="La Pampa">LA PAMPA</option>
                            <option value="La Rioja">LA RIOJA</option>
                            <option value="Mendoza">MENDOZA</option>
                            <option value="Misiones">MISIONES</option>
                            <option value="Neuquen">NEUQUEN</option>
                            <option value="Rio Negro">RIO NEGRO</option>
                            <option value="Salta">SALTA</option>
                            <option value="San Luis">SAN LUIS</option>
                            <option value="Santa Cruz">SANTA CRUZ</option>
                            <option value="Santa Fe">SANTA FE</option>
                            <option value="Santiago del Estero">SANTIAGO DEL ESTERO</option>
                            <option value="Tierra del Fuego">TIERRA DEL FUEGO</option>
                        </select>
                        <div class="ordennom">
                            <label for="localidad">Localidad<h22>*</h22></label>
                            <input type="text" name="localidad" id="localidad" onchange="quitar()">
                        </div>
                        <div class="ordennom">
                            <label for="direccion">Direccion<h22>*</h22></label>
                            <input type="text" name="direccion" id="direccion" onchange="quitar()">
                        </div>
                    </div>
                </div>
            </div>  
        
            <div class="datoscliente">
                <h1>Formas de pago</h1><br>
                <p class="txt-finalizar">Seleccione una forma de pago</p>
                <div class="formularioenvio">
                    <input type="radio" name="mediodepago" value="transferencia" id="transferencia" onclick="formapago()">
                    <label for="transferencia" id="labeltransferencia">Transferencia</label>

                    <input type="radio" name="mediodepago" value="mercadopago" id="mercadopago" onclick="formapago()">
                    <label for="mercadopago" id="labelmercadopago">Mercado Pago</label>
                    
                    <div id="conte-transferencia" style="display:none;">
                        <b>Número de CBU:</b> 11122223333444455556666  <br>
                        <b>Alias de CBU:</b> HOLA.CHAU.ALIAS <br>
                        <b>Titular de la cuenta:</b> Nombre Apellido
                    </div>
                    <div id="conte-mercadopago" style="display:none;">
                    </div>
                </div>
            </div>
            <div class="datoscliente">
                <div class="g-recaptcha" data-sitekey="6LfgRkUiAAAAAF2YArdjfpR37PDZRxEFk6yIcomh"></div>
            </div>
        </form>

            <div id="conte-mp" style="display:none;">
                <script src="https://sdk.mercadopago.com/js/v2"></script>
                <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>"></script>
            </div>

            <div class="datoscliente">   
                <h1>Total del carrito</h1>
                <table>
                    <tr class="totaltabla">
                        <td class="td-filatabla"><b>Total:</b></td> 
                        <td class="td-filatabla2">$<?php echo $totalfinal2=number_format($total, 2, ',', ''); ?></td>    
                    </tr>
                </table>   
            </div>
            
            <div class="btn-finalizar" name="btn" id="btn" onclick="validar();">REALIZAR EL PEDIDO</div>
            <a href="index.php" class="btn-continuar">Continuar comprando</a>
        
        </div>

        <div class="conte-carrito">
            <div class="titu-contecarri">Resumen del pedido</div>
            <?php 
            for($i=0;$i<count($arregloCarrito);$i++){
            ?>
            <div class="conte-produ">
                <img src="../img/productos/<?php echo $arregloCarrito[$i]['id'];?>-1.jpg" class="img-contecarri">
                <div class="conte-canti"><?php echo $arregloCarrito[$i]['cantidad'];?></div> 
                <div class="conte-nombre">
                    <b><?php echo $arregloCarrito[$i]['nombre'];?></b>
                </div> 
            </div>    
            <?php } ?>   
            <div class="conte-total">
                <b>Total: $<?php echo $totalfinal2;?></b><br>
                <a href="index.php" class="btn-contecarri">Continuar comprando</a>
            </div> 
        </div>     
        <?php } ?>   
        <footer>
            <img src="../img/logo-negro.svg" alt="MuuG Ingenieros del té" class="logo-footer">
            
            <a href="https://www.instagram.com/perfil/" target="_blank">
                <img src="../img/iconos/instagram.svg" class="iconos-footer" alt="instagram">
            </a>
            <a href="https://wa.me/5491122223333" target="_blank">
                <img src="../img/iconos/whatsapp.svg" class="iconos-footer" alt="whatsapp">
            </a>
            <a href="../contacto/">
                <img src="../img/iconos/mensaje.svg" class="iconos-footer" alt="contacto">
            </a>
            <p class="txt-footer">Violet - Productos Naturales. Buenos Aires, Argentina.</p>
        </footer>
        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script type="text/javascript" src="../js/validarformu.js"></script>

        <script>
            function formapago(){
                if(document.getElementById('transferencia').checked){
                    document.getElementById('conte-mp').style.display = "none";
                    document.getElementById('conte-mercadopago').style.display = "none";
                    document.getElementById('conte-transferencia').style.display = "block";
                }
                if(document.getElementById('mercadopago').checked){
                    document.getElementById('conte-mp').style.display = "block";
                    document.getElementById('conte-mercadopago').style.display = "block";
                    document.getElementById('conte-transferencia').style.display = "none";
                }
            }
        </script>
    </body>
</html>