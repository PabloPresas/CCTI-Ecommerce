<?php
  include("chequearusuario.php");
  include("../../php/conexion.php");

  $id=$_POST['idventa'];
  $correo=$_POST['correo'];
  $estadoentrega=$_POST['estadoenvio'];

  $editar = "UPDATE ventas SET estadoentrega='$estadoentrega' WHERE idventa = '$id'";
  $resultado = mysqli_query($conexion, $editar);

  //CREAMOS EL CORREO PARA EL CLIENTE
    $cabecera = 'From: Violet - Tienda Natural <no-responder@dominio.com>' . "\r\n" .
    'Reply-To: no-responder@violettienda.com.ar' . "\r\n" .
    'Content-type: text/html' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $mensaje = "<html>
        <body style='width:100%; max-width:800px; margin:0 auto; font_family:sans-serif;'>
            <div style=''>
                Hola ". $nombre .".<br>
                el detalle de tu pedido se modifico a: ".$estadoentrega."
            <div>

        </body>
    </html>";

    mail($correo, "Estado de envio", $mensaje, $cabecera);

  header("Location:../verventas.php?p=2");

?>