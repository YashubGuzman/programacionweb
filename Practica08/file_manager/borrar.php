<?php

include '../config.php';

$nombre = filter_input(INPUT_GET, 'archivo');
if ($nombre === NULL || $nombre === false || $nombre === '') {
    header('Location: ../file_manager/');
    exit();
}

$rutaArchivo = DIRECTORIO_ARCHIVOS . $nombre;

$extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

if (strtolower($extension) == 'pdf' && file_exists($rutaArchivo)) {
    unlink($rutaArchivo);
}

header('Location: ../file_manager/');
