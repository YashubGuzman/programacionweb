<?php 

include 'config.php';
include 'db.php';
include 'session.php';

$contrasena_nueva = filter_input(INPUT_POST, 'contrasena_nueva');

echo $contrasena_nueva;

//Validaciones en los formularios
if ($contrasena_nueva === false || $contrasena_nueva === NULL || $contrasena_nueva === ''){
    
    header('Location: contrasena.html');
    exit();
}

echo $_SESSION['usuario_id'];


//Inserción de datos del usuario a la base de datos
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'INSERT INTO users (username, password, name, email) VALUES (:username,:contrasena,:nombre,:email)';
$sqlCmd = 'UPDATE users SET password = :contrasena_nueva WHERE id=:id_usuario';
$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':contrasena_nueva', $contrasena_nueva);
$stmt->bindParam(':id_usuario', $_SESSION['usuario_id']);
$stmt->execute();

	header('Location: login.php');

 ?>






