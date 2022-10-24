<?php 
include("../../php/conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$consulta = "SELECT * FROM administradores WHERE usuario LIKE '$usuario' AND clave LIKE '$clave'";
$result = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($result);

if($filas != 0){
    session_start();
    $_SESSION['admin']="$usuario";
    header("Location:../cpanel.php");
    exit();

}else{
    header("location:../index.php?e=1");
}
?>