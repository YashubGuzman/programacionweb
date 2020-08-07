<?php

include 'config.php';
include 'db.php';
include 'session.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Práctica 08</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="contenedor">
        <?php include 'html_parts/session_control.php'; ?>
        <h3>Practica 08: Manejo de sesiones y login</h3>
        <ul>
            <li><a href="todos/">TODOs</a></li>
            <li><a href="file_manager/">File Manager</a></li>
        </ul>
    </div>
</body>
