function validar(){
    var formulario = document.getElementById('validarformu');

    if(document.getElementById('nombre').value != "" &&
       document.getElementById('apellido').value != "" && 
       document.getElementById('correo').value != "" &&
       document.getElementById('telefono').value != ""){
           var datos = "ok";
    }
    if(document.getElementById('envio').checked == true){
        if(document.getElementById('localidad').value != "" &&
           document.getElementById('provincia').value != "" &&
           document.getElementById('direccion').value != "" ){
            var envio = "ok";
        }
    }else if(document.getElementById('coordi').checked == true){
        var envio = "ok";
    }

    if(document.getElementById('transferencia').checked == true ||
       document.getElementById('mercadopago').checked == true){
        var pago = "ok";
    }

    //Si esta todo OK envia el formulario, sino sigue para abajo
    if(datos=="ok" && envio=="ok" && pago=="ok"){
        formulario.submit();
    }else{
        $('#btn').click(() => {
            $('html,body').animate({
                'scrollTop': $('#formulario').offset().top
            }, 1000);
        });
    }


//Chequeamos que los datos esten completos, sino, cambio diseño x rojo error
if(document.getElementById('nombre').value == ""){
    document.getElementById('nombre').style.border = "thin solid #ff0000";
    document.getElementById('nombre').style.background = "#f4c7c7";  
}
if(document.getElementById('apellido').value == ""){
    document.getElementById('apellido').style.border = "thin solid #ff0000";
    document.getElementById('apellido').style.background = "#f4c7c7";  
}
if(document.getElementById('correo').value == ""){
    document.getElementById('correo').style.border = "thin solid #ff0000";
    document.getElementById('correo').style.background = "#f4c7c7";  
}
if(document.getElementById('telefono').value == ""){
    document.getElementById('telefono').style.border = "thin solid #ff0000";
    document.getElementById('telefono').style.background = "#f4c7c7";  
}

//Se fija que alguna de las dos opciones de envio esten chekeadas
if(document.getElementById('envio').checked == false && 
   document.getElementById('coordi').checked == false){
        Swal.fire('Selecciona una forma de envio.');
}

//Valida si los datos de envio estan completos si es que selecciono QUIERO ENVIO
if(document.getElementById('envio').checked == true){
    if(document.getElementById('direccion').value == ""){
        document.getElementById('direccion').style.border = "thin solid #ff0000";
        document.getElementById('direccion').style.background = "#f4c7c7";  
    }
    if(document.getElementById('localidad').value == ""){
        document.getElementById('localidad').style.border = "thin solid #ff0000";
        document.getElementById('localidad').style.background = "#f4c7c7";  
    }
    if(document.getElementById('provincia').value == ""){
        document.getElementById('provincia').style.border = "thin solid #ff0000";
        document.getElementById('provincia').style.background = "#f4c7c7";  
    }
}

//Se fija que alguna de las dos opciones de pago esten chekeadas
if(document.getElementById('transferencia').checked == false && 
   document.getElementById('mercadopago').checked == false){
        Swal.fire('Selecciona una forma de pago.');
}

}



function quitar(){
    if(document.getElementById('nombre').value != ""){
        document.getElementById('nombre').style.border = "thin solid #000000";
        document.getElementById('nombre').style.background = "#FFFFFF";
    }
    if(document.getElementById('apellido').value != ""){
        document.getElementById('apellido').style.border = "thin solid #000000";
        document.getElementById('apellido').style.background = "#FFFFFF";
    }
    if(document.getElementById('correo').value != ""){
        document.getElementById('correo').style.border = "thin solid #000000";
        document.getElementById('correo').style.background = "#FFFFFF";
    }
    if(document.getElementById('telefono').value != ""){
        document.getElementById('telefono').style.border = "thin solid #000000";
        document.getElementById('telefono').style.background = "#FFFFFF";
    }

    if(document.getElementById('envio').checked == true){
        if(document.getElementById('localidad').value != ""){
            document.getElementById('localidad').style.border = "thin solid #000000";
            document.getElementById('localidad').style.background = "#FFFFFF";
        }
        if(document.getElementById('direccion').value != ""){
            document.getElementById('direccion').style.border = "thin solid #000000";
            document.getElementById('direccion').style.background = "#FFFFFF";
        }
        if(document.getElementById('provincia').value != ""){
            document.getElementById('provincia').style.border = "thin solid #000000";
            document.getElementById('provincia').style.background = "#FFFFFF";
        }
    }
}