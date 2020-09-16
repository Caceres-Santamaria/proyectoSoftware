/* jQuery("#costoEnvio").click(function() {
    //cogemos el valor del input
    var num = jQuery("#ciudad").val();

    //creamos array de parámetros que mandaremos por POST
    var params = {
        "numFactorial": num
    };

    //llamada al fichero PHP con AJAX
    $.ajax({
        data: params,
        url: 'ajax/factorial.php',
        dataType: 'html',
        type: 'post',
        beforeSend: function() {
            //antes de enviar la petición al fichero PHP, mostramos mensaje
            jQuery("#costoE").html("calculando envío");
        },
        success: function(response) {
            //mostramos salida del PHP
            jQuery("#costoE").html(response);

        }
    });
}); */