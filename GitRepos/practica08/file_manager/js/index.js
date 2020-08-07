// jQuery HTML elements.
var $iArchivo = $('#iArchivo');
var $btnSubir = $('#btnSubir');

/**
 * Event hander del click del input submit btnSubir.
 * @param {*} e Objeto del evento.
 */
function btnSubir_click(e) {

    if (!$iArchivo[0].files.length) {
        $iArchivo.focus();
        return;
    }

    // TODO: Validación de que el archivo sea PDF (extensión .pdf).

    btnSubir.prop('disabled', true);

    let params = new FormData();
    params.append('archivo', $iArchivo[0].files[0]);

    $.ajax({
        // Configuraciones.
        method: 'POST',
        url: 'ajax/subir_archivo.php',
        data: params,
        type: 'POST',
        dataType:'pdf',
        contentType: false,
        processData: false,
        cache: false,
        contentType: false,

        // Función callback que se ejecuta cuando la llamada AJAX
        // fue exitosa.
        success: function(r) {
            console.log(r);
            $iArchivo.val('');
        },
        // Si hubo algún error, se ejecuta lo que esté en esta
        // función callback.
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ERROR');
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
        
    });

}

$btnSubir.on('click', btnSubir_click);
