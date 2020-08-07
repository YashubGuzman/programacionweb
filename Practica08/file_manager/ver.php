<?php

include '../config.php';

$nombre = filter_input(INPUT_GET, 'archivo');
if ($nombre === NULL || $nombre === false || $nombre === '') {
    header('Location: ../fileadmin/');
    exit();
}

$rutaArchivo = DIRECTORIO_ARCHIVOS . $nombre;

$extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);
if ($extension != 'pdf') {
    echo 'Solo se muestran archivos PDF.';
    exit();
}

if (!file_exists($rutaArchivo)) {
    echo 'No existe el archivo.';
    exit();
}

header('Content-Type: application/pdf');  // MIME type.
header('Content-Disposition: inline; filename="' . $nombre . '"');
header('Content-Length: ' . filesize($rutaArchivo));

readfile($rutaArchivo);
