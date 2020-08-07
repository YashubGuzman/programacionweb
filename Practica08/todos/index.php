<?php

include '../config.php';
include '../db.php';
include '../session.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Práctica 08</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="contenedor">
        <?php include '../html_parts/session_control.php'; ?>
        <a href="../">Regresar</a>
        <h3>Practica 08: TODOs</h3>
        
        <div>
            <h4>Agregar ToDo</h4>
            <input id="txtTodo" type="text" />
            <input id="btnAgregarTodo" type="button" value="Agregar" />
        </div>

        <input type="button" id="btnLoadTodos" value="Cargar" />
        
        <!-- Div donde se va a cargar la tabla de ToDos -->
        <div id="divTodos"></div>

    </div>
    <script src="../js/jquery.js"></script>
    <script src="js/index.js?v=20180802-2"></script>
</body>
</html>
