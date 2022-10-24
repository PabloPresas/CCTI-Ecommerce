<?php
    if(isset($_GET['conteventa'])){
        $conteventa = $_GET['conteventa'];

    }else{
        $conteventa = "";
    }
    if($conteventa = ""){?>
<div class="contenedor" id="detalleventa">
    <b>DETALLE DE LA VENTA</b>
    <table>
        <tr>
            <td class="td-detalle">Productos</td>
            <td class="td-detalle">Cantidad</td>
            <td class="td-detalle">Subtotal</td>
        </tr>

        <?php
        $consulta = "SELECT * FROM detalleventas WHERE idventa Like '$conteventa'";
        $resultado = mysqli_query($conexion, $consulta);
        while($mostrar=mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $mostrar['producto'];?></td>
            <td><?php echo $mostrar['cantidad'];?></td>
            <td><?php echo $mostrar['precio'];?></td>
        </tr>
        <?php } ?>
    </table>
    <label id="cerrar" onclick="cerrardetalleventa()">X</label>
</div>
<?php } ?>