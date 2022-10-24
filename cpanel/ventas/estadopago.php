<?php 
    if(isset($_GET['estadopago'])){
         $estadopago = $_GET['estadopago'];
    }else{
        $estadopago = "";
    }

    if(isset($_GET['correo'])){
        $correo = $_GET['correo'];
    }else{
        $correo = "";
    }

    if($estadopago != ""){ ?>
<div class="contenedor" id="estadopago">
    <div class="detalle">
        <b>ESTADO PAGO</b>
        <form action="phpcpanel/modificarpago.php" method="post">
            <input type="hidden" name="idventa" value="<?php echo $estadopago;?>">
            <input type="hidden" name="correo" value="<?php echo $correo;?>">

            <select name="estadopago">
                <option>Selecciona un estado de pago</option>
                <option value="pendiente">Pendiente</option>
                <option value="pagado">Pagado</option>


            </select>
            <button class="btn-enviardatos2">MODIFICAR</button>
        </form>
        <label id="cerrar" onclick="cerrarestadopago()">X</label>
    </div>
</div>

<?php } ?>