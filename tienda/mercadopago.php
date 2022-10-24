<?php
require_once "../extensiones/vendor/autoload.php";
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('APP_USR-161002425725812-061122-5ca8dd2120d62d2cfb57483ba48d2ef4-83326780');
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    $totalfinal = 20;
    
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Compra en Violet - Tienda virtual';
    $item->quantity = 1;
    $item->unit_price = $totalfinal;
    $preference->items = array($item);
    $preference->save();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mercado Pago</title>
</head>
<body>  
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>"></script>
</body>
</html>