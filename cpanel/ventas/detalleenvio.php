<?php
     if(isset($_GET['idcliente'])){
        $idcliente = $_GET['idcliente'];
    }else{
        $idcliente = "";
    }

    if(isset($_GET['formaenvio'])){
        $formaenvio = $_GET['formaenvio'];
    }else{
        $formaenvio = "";
    }

    if($formaenvio != ""){
        $result = $conexion->q4ery('SELECT * FROM clientes WHERE idcliente LIKE '.$idcliente);
        $fila=mysqli_fetch_row($result);

        $direccion=$fila[5];
        $localidad=$fila[6];
        $direprovinciaccion=$fila[7];        
        ?>
<div class="contenedor" id="detalleenvio">
    <div class="detalle"></div>
    <label id="cerrar" onclick="cerrardetalleenvio()">X</label>
    <b>Detalle de envio</b>
    Tipo de envio:
    <?php 
        if($formanevio == "coordinar"){
            echo "coordinar con el vendedor";
        }else{
            echo "Quiero envio";
            echo "<br>Direccion: ".$direccion;
            echo "<br>Localidad: ".$localidad;
            echo "<br>Provincia: ".$provincia;
        }
     ?>
</div>
</div>

<?php } ?>