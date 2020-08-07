<?php

include '../config.php';

$archivosDelDirectorio = scandir(DIRECTORIO_ARCHIVOS);

$archivosPdf = array();

foreach ($archivosDelDirectorio as $archivo) {   
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    if (strtolower($ext) === 'pdf') 
        $archivosPdf[] = $archivo;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Práctica 09</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="contenedor">

        <h3>Práctica 09: File Manager</h3>

        
        <p>Subir archivo:</p>
        <form action="subir_archivo.php" method="POST" enctype="multipart/form-data">
            <label for="iArchivo">Archivo:</label>
            <input type="file" id="iArchivo" name="archivo" required="required" /><br />
            <input type="submit" id="btnSubir" value="Subir" />
        </form>

        <p>Archivos Actuales:</p>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Ver</th>
                    <th>Borrar</th>
                </tr>
            <thead>
            <tbody>
<?php foreach ($archivosPdf as $a) { ?>
                <tr>
                    <td><?=$a?></td>
                    <td><a href="ver.php?archivo=<?=rawurlencode($a)?>" target="_blank">VER</a></td>
                    <td><a href="borrar.php?archivo=<?=rawurlencode($a)?>">BORRAR</a></td>
                <tr>
<?php } ?>
            </tbody>
        </table>

    </div>
    <script src="../js/jquery.js"></script>
    <script src="js/index.js?v=20180809-1"></script>
</body>
</html>