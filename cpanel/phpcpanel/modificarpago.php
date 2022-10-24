<?php
  include("chequearusuario.php");
  include("../../php/conexion.php");

  $id=$_POST['idventa'];
  $correo=$_POST['correo'];
  $estadopago=$_POST['estadopago'];

  $editar = "UPDATE ventas SET estadopago='$estadopago' WHERE idventa = '$id'";
  $resultado = mysqli_query($conexion, $editar);

  header("Location:../verventas.php?p=1");

?>