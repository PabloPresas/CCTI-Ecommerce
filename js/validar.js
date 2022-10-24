function validar(){
    var formulario = document.getElementById('formulario');

    if(document.getElementById('nombre').value == ""){
        document.getElementById('nombre').style.border = "thin solid #ff0000";
        document.getElementById('nombre').style.background = "#f7c1c1";
    }
    if(document.getElementById('correo').value == ""){
        document.getElementById('faltacorreo').style.display = "block";
    }
    if(document.getElementById('mensaje').value == ""){
        Swal.fire('Completa tu mensaje');
    }

    if(document.getElementById('nombre').value != "" && 
       document.getElementById('correo').value != "" &&
       document.getElementById('mensaje').value != ""){
        formulario.submit();
    }
}

function quitar(){
    if(document.getElementById('nombre').value != ""){
        document.getElementById('nombre').style.border = "thin solid #000000";
        document.getElementById('nombre').style.background = "#FFFFFF";
    }
    if(document.getElementById('correo').value != ""){
        document.getElementById('faltacorreo').style.display = "none";
    }
}