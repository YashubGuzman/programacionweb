<?php 

include '../../config.php';

header('Content-Type: application/json');
$res = array('mensaje' => null, 'error' => null);

$nombreArchivo = basename($_FILES['archivo']['name']);
$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

if (strtolower($extension) != 'pdf') {
    $res['mensaje'] = 'ERROR';
    $res['error'] = 'Solo se pueden subir archivos PDF.';
    echo json_encode($res);
    exit();
}

move_uploaded_file(
    $_FILES['archivo']['tmp_name'], 
    DIRECTORIO_ARCHIVOS . $nombreArchivo
);

$res['mensaje'] = 'OK';

echo json_encode($res);
