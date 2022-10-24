<?php
include("../../php/conexion.php");
session_start();


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$notas = $_POST['notas'];
$formaenvio = $_POST['formaenvio'];
$provincia = $_POST['provincia'];
$localidad = $_POST['localidad'];
$direccion = $_POST['direccion'];
$mediodepago = $_POST['mediodepago'];
$fecha = date("Y-m-d");
$captcha = $_POST['g-recaptcha-response'];
$secret = '6LfgRkUiAAAAADdLl96ECTCM2WFFDhiyfdVmZYUx';

if(!$captcha){
  echo "Por favor valida el Captcha";
  header("refresh:2;../index.php");
}else{
  $response = file_get_contents("https://google.com/recaptcha/api/siteverify?=$secret&response=$captcha");
  $arr = json_decode($response, TRUE);

  if(isset($_SESSION['carrito'])){
    $guardarcliente = "INSERT INTO `clientes`(`idcliente`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`, `localidad`, `provincia`) VALUES('null','$nombre','$apellido','$telefono','$correo','$direccion','$localidad','$provincia')";
    $resultcliente = mysqli_query($conexion, $guardarcliente);

    $result = $conexion->query("SELECT * FROM clientes WHERE correo = '$correo' AND nombre = '$nombre' AND apellido = '$apellido'");
    $fila = mysqli_fetch_row($result);
    $idcliente = $fila[0];

    $cventa = "SELECT MAX(idventa)+1 as idventa FROM ventas";
    $resultventa = mysqli_query($conexion, $cventa);
    while($mostrar=mysqli_fetch_array($resultventa)){
      $idventa = $mostrar['idventa'];
    }

    $arreglocarrito = $_SESSION['carrito'];
    $total = 0;
    $ccarrito="INSERT INTO `detalleventas`(`idventa`, `producto`, `precio`, `cantidad`, `subtotal`) VALUES ";

    for($i=0;$i<count($arreglocarrito);$i++){
             //CONCATENAMOS LOS DATOS PARA QUE SE GUARDEN EN LA TABLA DETALLE VENTAS.
      $subtotal = ($arreglocarrito[$i]['precio'] * $arreglocarrito[$i]['cantidad']);       
      $ccarrito.="('$idventa','".$arreglocarrito[$i]['nombre']."','".$arreglocarrito[$i]['precio']."','".$arreglocarrito[$i]['cantidad']."','$subtotal' ),";       
                        //GENERAMOS EL TOTAL DE LA COMPRA.
      $total = $total + ($arreglocarrito[$i]['precio'] * $arreglocarrito[$i]['cantidad']);

      $carritomensaje.= $arreglocarrito[$i]['nombre'] . " x " . $arreglocarrito[$i]['cantidad'] ." Unidad/es ..........$" .$arreglocarrito[$i]['precio'] . "<br>";
    }

    $carrito_final = substr($ccarrito, 0, -1);
    $carrito_final.= ';';
    $resultadocarrito = mysqli_query($conexion, $carrito_final);

                        //GUARDAMOS TODO EN VENTAS.
    $guardarventa = "INSERT INTO `ventas`(`idventa`, `idcliente`, `fecha`, `total`, `formapago`, `formaenvio`, `estadopago`, `estadoentrega`, `notas`) VALUES ('$idventa','$idcliente','$fecha','$total','$mediodepago','$formaenvio','Pendiente','En proceso', '$notas')";
    $resultventa = mysqli_query($conexion, $guardarventa);

    $contenidomail = "<html>    
    <body style='background: #f7f1eb; width:100%; max-width:800px; margin:0 auto; line-height: 20px; font-family: Brandon_light; font-size: 20px;'>
        <div style='width:80%; padding-left: 10%; padding-top: 5%; padding-right: 10%; padding-bottom:5%; text-align: center; background: #e3d9cf; color: #000;'>
            Gracias por su compra!! <br>
            Numero de seguimiento <br># ".$idventa."</br>
        </div>
        <div style='width:90%; padding:5%;'>
            Hola ".$idnombre." gracias por tu compra en Violet <br><br>
            <b>Detalle de tu compra</b><br>
            ".$carritomensaje."<br>
            Total de la compra: $".$total."
        </div>
        <div style='width:90%; padding:5%; text-align: center; text-decoration: none;'>
            <p style='width:95%; font-family: Brandon_light; font-size: 20px;'>Seguinos en nuestras redes</p>

            <a href='#'>
                <img src='https://dominio.com/img/iconos/instagram.svg' style='width: 30px; margin: 2% 1% 1%;' alt='instagram'>
            </a>
            <a href='#'>
                <img src='../../img/iconos/whatsapp.svg' style='width: 30px; margin: 2% 1% 1%;' alt='whatsapp'>
            </a><br>
            <a href='#' style='text-decoration: none; color: #d2b79c; box-shadow: #000 solid 5px'>Contactanos</a>            
        </div>        
        <img src='https://dominio.com/img/gracias.png' alt='' style='width: 90%; padding: 5%;'>             
    </body>
</html>";

    mail($correo,"Tu compra en Violet",$contenidomail);

    //BORRAMOS CARRITO
    session_destroy();

    header('location:../graciasportucompra.php');
  }
}