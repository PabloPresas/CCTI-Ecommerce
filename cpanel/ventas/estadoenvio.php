<?php 
    if(isset($_GET['estadoenvio'])){
         $estadoenvio = $_GET['estadoenvio'];
    }else{
        $estadoenvio = "";
    }

    if(isset($_GET['correo'])){
        $correo = $_GET['correo'];
    }else{
        $correo = "";
    }

    if($estadoenvio != ""){ ?>
<div class="contenedor" id="estadoenvio">
    <div class="detalle">
        <b>ESTADO DE ENVIO</b>
        <form action="phpcpanel/modificarenvio.php" method="post">
            <input type="hidden" name="idventa" value="<?php echo $estadoenvio;?>">
            <input type="hidden" name="correo" value="<?php echo $correo;?>">

            <select name="estadoenvio">
                <option>Selecciona un estado de envio</option>
                <option value="entregado">Entregado</option>
                <option value="en camino">En camino</option>
                <option value="en preparacion">En preparacion</option>


            </select>
            <button class="btn-enviardatos2">MODIFICAR</button>
        </form>
        <label id="cerrar" onclick="cerrarestadoenvio()">X</label>
    </div>
</div>

<?php } ?>