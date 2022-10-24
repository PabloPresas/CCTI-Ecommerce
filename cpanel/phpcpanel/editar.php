<?php
    include("chequearusuario.php");
    include("../../php/conexion.php"); 

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];

    $consulta = "SELECT * FROM productos WHERE nombre LIKE '$nombre'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_num_rows($resultado);

    if($fila != 0){
        $modificar =  "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', stock='$stock' WHERE id LIKE '$id'";
        $resultmodi = mysqli_query($conexion, $modificar);

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 1 es muy pesada";
        header("refresh:2;../editarproductos.php?id=$id");
        exit();
        }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 2 es muy pesada";
        header("refresh:2;../editarproductos.php?id=$id");
        exit();
        }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 3 es muy pesada";
        header("refresh:2;../editarproductos.php?id=$id");
        exit();
        }

        if($_FILES['imagen']['size']>3000000){
        echo "La imagen 4 es muy pesada";
        header("refresh:2;../editarproductos.php?id=$id");
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
      header('Location:../verproductos.php?m=ok');
    }

?>