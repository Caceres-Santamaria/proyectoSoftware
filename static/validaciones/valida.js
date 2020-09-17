function validar_texto(evento) {
    var key = window.Event ? evento.which : evento.keyCode;
    if (((key >= 97 && key <= 122) || (key >= 65 && key <= 90)) && key != 255 && key != 32) {
        return true;
    } else {

        return false;
    }
}

function validar_textopersona(evento) {
    var key = window.Event ? evento.which : evento.keyCode;
    if (((key >= 97 && key <= 122) || (key >= 65 && key <= 90)) || (key == 255 || key == 32)) {
        return true;
    } else {

        return false;
    }
}

function validar_numeros(evento) {
    var key = window.Event ? evento.which : evento.keyCode;
    if (key >= 48 && key <= 57 && key != 255 && key != 32) {
        return true;
    } else {
        return false;
    }
}


function validar_longitud_nom(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 15 && dato.length >= 3) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert("El " + title + " no cumple con la longitud requerida");
        return false;
    }
}

function validar_longitud10(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 10) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert(title + " demasiado larg@");
        return false;
    }
}

function validar_longitud20(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 20) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert(title + " demasiado larg@");
        return false;
    }
}

function validar_longitud30(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 30) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert("El " + title + " es demasiado largo");
        return false;
    }
}

function validar_longitud40(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 40) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert("El " + title + " es demasiado largo");
        return false;
    }
}

function validar_longitud100(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 100) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert("El " + title + " es demasiado largo");
        return false;
    }
}

function validar_cedula() {
    var dato = document.getElementById("cedula").value;
    if (dato.length == 8 || dato.length == 10) {
        document.getElementById("cedula").style.borderColor = "gray";
        return true;
    } else {
        document.getElementById("cedula").style.borderColor = "red";
        alert("La cédula debe tener 8 o 10 dígitos, el numero ingresado es de: " + dato.length + " digitos");
        return false;
    }
}

function validar_telefono() {
    var dato = document.getElementById("telefono").value;
    if (dato.length == 7 || dato.length == 10) {
        document.getElementById("telefono").style.borderColor = "gray";
        return true;
    } else {
        document.getElementById("telefono").style.borderColor = "red";
        alert("El telefono debe tener 7 o 10 dígitos, el numero ingresado es de: " + dato.length + " digitos");
        return false;
    }
}

function validar_email() {
    var e = document.getElementById("email").value;
    if ((/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/.test(e))) {
        document.getElementById("email").style.borderColor = "gray";
        return true;
    } else {
        document.getElementById("email").style.borderColor = "red";
        alert("El e-mail ingresado no es valido");
        document.getElementById("email").focus();
        return false;
    }
}

function validar_fecha() {
    var caja = document.getElementById("fecha");
    var date = document.getElementById("fecha").value;
    var x = new Date().getDate();
    var y = new Date().getFullYear();
    var z = new Date().getMonth();
    var hoy = new Date(y, z, x);
    var fecha = date.split("-");
    var fecha = new Date(fecha[0], fecha[1] - 1, fecha[2]);
    if (fecha >= hoy) {
        alert("La fecha ingresada no es correcta");
        caja.value = " ";
        document.getElementById("fecha").style.borderColor = "red";
        return false;
    } else
        document.getElementById("fecha").style.borderColor = "gray";
    return true;
}

function validar_fechafin() {
    var caja = document.getElementById("fechafin");
    var date = document.getElementById("fechafin").value;
    var x = new Date().getDate();
    var y = new Date().getFullYear();
    var z = new Date().getMonth();
    var hoy = new Date(y, z, x);
    var fecha = date.split("-");
    var fecha = new Date(fecha[0], fecha[1] - 1, fecha[2]);
    if (fecha >= hoy) {
        alert("La fecha ingresada no es correcta");
        caja.value = " ";
        document.getElementById("fechafin").style.borderColor = "red";
        return false;
    } else
        document.getElementById("fechafin").style.borderColor = "gray";
    return true;
}

function validateForm(e) {
    var elements = e.elements;
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].tagName === "INPUT" || elements[i].tagName === "SELECT") {
            if (elements[i].value.trim() === "" && elements[i].required === true) {
                var title = elements[i].getAttribute('title');
                alert("Por favor completa el campo " + title);
                return false;
            }
        }
    }
}

function validar_combos(nom) {
    var combo = document.getElementById(nom).value;
    if (combo == "vacio") {
        alert("Por favor elija una opción válida");
        document.getElementById(nom).style.borderColor = "red";
        return false;
    } else {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    }
}

function minuscula(id) {
    var valor = document.getElementById(id);
    valor.value = valor.value.toLowerCase();
}

function validar_longitud3(nom) {
    var dato = document.getElementById(nom).value;
    if (dato.length <= 3) {
        document.getElementById(nom).style.borderColor = "gray";
        return true;
    } else {
        title = document.getElementById(nom).getAttribute('title');
        document.getElementById(nom).style.borderColor = "red";
        alert("El " + title + " es demasiado largo");
        return false;
    }
}

function noNegativo(nom) {
    var dato = document.getElementById(nom);
    if (dato.value < 0) {
        dato.value = 0;
    }
}

function elimina(id, pagina, cod) {
    location.href = "../funciones/elimina.php?id=" + id + "&pagina=" + pagina + "&cod=" + cod;

}

function modifica(id, pagina, cod) {
    location.href = "../vistasA/modifica.php?id=" + id + "&pagina=" + pagina + "&cod=" + cod;

}

function retro(pagina) {
    console.log(pagina);
    location.href = './' + pagina + '';
}

function regarga() {
    var valor = document.getElementById('tipo').value;
    location.href = "../VistasA/modificarProducto.php?categoria=" + valor + "&id=1";
}

function regarga1() {
    var valor = document.getElementById('subtipo').value;
    location.href = "../VistasA/modificarProducto.php?categoria=" + valor + "&id=2";
}

function maximacantidad(cantidad) {
    var valor = document.getElementById('cantidadB').value;
    if (valor > cantidad) {
        document.getElementById('cantidadB').value = cantidad;
    }

}

function eliminaCiu(id) {
    location.href = "../funciones/eliminaCiudad.php?id=" + id;
}