// jQuery HTML elements.
var $iArchivo = $('#iArchivo');
var $btnSubir = $('#btnSubir');

/**
 * Event hander del click del input submit btnSubir.
 * @param {*} e Objeto del evento.
 */
function btnSubir_click(e) {

    // Previene el submit del form.
    e.preventDefault();
    
    // Validación de que se haya seleccionado un archivo en el
    // input file iArchivo.
    if ($iArchivo[0].files.length === 0) {
        $iArchivo.focus();
        return;
    }

    // Obtenemos el archivo a subir a partir del input file.
    var archivo = $iArchivo[0].files[0];

    // Creamos un object FormData para enviar los parámetros;
    // En este caso, el archivo que queremos subir mediante AJAX.
    // NOTA: se pueden enviar más parámetros, valores... 
    var params = new FormData();
    params.append('archivo', archivo);

    // Llamada AJAX con el contenido del archivo.
    $.ajax({

        // Configuraciones.
        method: 'POST',
        url: 'ajax/subir_archivo.php',
        data: params,
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
