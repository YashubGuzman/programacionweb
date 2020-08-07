<?php

session_start();
session_unset();
session_destroy();

include 'config.php';
include 'db.php';

$usuario = filter_input(INPUT_POST, 'usuario');
$contrasena = filter_input(INPUT_POST, 'contrasena');

if ($usuario === false || $usuario === NULL || $usuario === '' ||
        $contrasena === false || $contrasena === NULL || $contrasena === '') {
    header('Location: login.html');
    exit();
}

// Validación del usuario
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'SELECT * FROM users WHERE username = :username';  // Comando SQL para consultar el user.
$stmt = $db->prepare($sqlCmd);  // Preparamos ese comando SQL para obtener el object Statement
$stmt->bindParam(':username', $usuario);  // asociamos los parametros del comando SQL a variables.
$stmt->execute();  // Ejecutamos la consulta.
$r = $stmt->fetch(PDO::FETCH_ASSOC);  // Obtenemos el primer row de la ejecución de la consulta.

// Si hay un registro asociado al username y si ese registro coincide el password.
if ($r && $r['password'] === $contrasena) {
    
    session_start();  // iniciamos la sesión.

    // Establecemos variables de sesión correspondientes a los datos del usuario.
    $_SESSION['usuario_id'] = (int)$r['id'];
    $_SESSION['usuario_username'] = $r['username'];
    $_SESSION['usuario_nombre'] = $r['name'];
    $_SESSION['usuario_correo'] = $r['email'];

    header('Location: ' . APP_ROOT);  // Redirect al index.php
    exit();

}

header('Location: login.html');
