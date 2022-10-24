<?php
    include("../../php/conexion.php");

    $nombre = $_post['nombre'];
    $precio = $_post['precio'];
    $descripcion = $_post['descripcion'];
    $stock = $_post['stock'];

    $consulta = "SELECT * FROM productos WHERE nombre LIKE '$nombre'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_num_rows($resultado);

    if($fila != 0){
      echo "Elproducto ya existe";
      header("refresh:2;../agregarproductos.php");
    }else{
      if($_FILES['imagen']['size']>3000000){
        echo "La imagen 1 es muy pesada";
        header("refresh:2;../agregarproductos.php?");
        exit();
      }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 2 es muy pesada";
        header("refresh:2;../agregarproductos.php?");
        exit();
        }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 3 es muy pesada";
        header("refresh:2;../agregarproductos.php?");
        exit();
        }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 4 es muy pesada";
        header("refresh:2;../agregarproductos.php?");
        exit();
      }

      $imagen = $_FILES['imagen']['nombre'];
      $tmpimagen = $_FILES['imagen']['tmp_name'];
      $directorio = "../../img/productos/".$id."-1.jpg";

      $imagen = $_FILES['imagendos']['nombre'];
      $tmpimagen = $_FILES['imagendos']['tmp_name'];
      $directoriodos = "../../img/productos/".$id."-2.jpg";

      $imagen = $_FILES['imagentres']['nombre'];
      $tmpimagen = $_FILES['imagentres']['tmp_name'];
      $directoriotres = "../../img/productos/".$id."-3.jpg";

      $imagen = $_FILES['imagencuatro']['nombre'];
      $tmpimagen = $_FILES['imagencuatro']['tmp_name'];
      $directoriocuatro = "../../img/productos/".$id."-4.jpg";

      if(is_uploaded_file($tmpimagen)){
        copy(tmpimagen, $directorio);
      }

      if(is_uploaded_file($tmpimagendos)){
        copy(tmpimagendos, $directoriocuatro);
      }

      if(is_uploaded_file($tmpimagentres)){
        copy(tmpimagentres, $directoriocuatro);
      }

      if(is_uploaded_file($tmpimagencuatro)){
        copy(tmpimagencuatro, $directoriocuatro);
      }

      $agregar = "INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `precio`, `stock`, `estado`) VALUES ('$id','$nombre','$descripcion','$precio','$stock','activo')";
      $resultadoagregar = mysqli_query($conexion, $agregar);
      header("location:../verproductos.php?a=ok");
    }



?>