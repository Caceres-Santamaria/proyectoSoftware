<script> 
    function enviar(c){
        //location.href = "Detalle.php?cod="+c;
        c = ""+c;
        location.href="../vistas/detalleProducto.php?id="+c;
    }
    var usuario = document.getElementById("usuario");  
    function datos(){
        //location.href = "Detalle.php?cod="+c;
        var xmlhttp;
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            xmlhttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4){
                usuario.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","VerDatos.php",true);
        xmlhttp.send();
    } 
    
    function actualizar(){
        //location.href = "Detalle.php?cod="+c;
        var xmlhttp;
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            xmlhttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4){
                usuario.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ActualizaDatos.php",true);
        xmlhttp.send();
    } 
    
    function enviarC(){
            cantidad = document.getElementById('cantidadB').value;
            codigo = document.getElementById('codigo').value;
            accion = document.getElementById('btnAction').value;
            location.href= "../funciones/Carrito.php?cnt="+cantidad+"&cod="+codigo+"&acc="+accion;
    }
    
    function reFresh() {
      location.reload(true);  
    }

</script>