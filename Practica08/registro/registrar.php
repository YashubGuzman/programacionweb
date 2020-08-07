<?php 

include '../config.php';
include '../db.php';

$usuario = filter_input(INPUT_POST, 'usuario');
$contrasena = filter_input(INPUT_POST, 'contrasena');
$nombre = filter_input(INPUT_POST, 'nombre');
$email = filter_input(INPUT_POST, 'email');


//Validaciones en los formularios
if ($usuario === false || $usuario === NULL || $usuario === '' ||
    $contrasena === false || $contrasena === NULL || $contrasena === '' ||
    $nombre === false || $nombre === NULL || $nombre === '' ||
    $email === false || $email === NULL || $email === '') {
    
    header('Location: index.html');
    exit();
}

//Consulta a la tabla usuarios para verificar que no haya usuarios repetidos
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd =  'SELECT * FROM users WHERE username = :username';
$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':username', $usuario);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);


if($r['username']===$usuario){

	header('Location: index.html'); //Si el usuario ya existe se recargara la pagina

}elseif($r['username']!=$usuario){	//Si el usuario no existe se insertara en la base de datos
	
	//Inserción de datos del usuario a la base de datos
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'INSERT INTO users (username, password, name, email) VALUES (:username,:contrasena,:nombre,:email)';
$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':username', $usuario);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->execute();

	header('Location: ../login.html');
}



/*
//Inserción de datos del usuario a la base de datos
$db = getPDO();  // Obtenemos objeto PDO.
$sqlCmd = 'INSERT INTO users (username, password, name, email) VALUES (:username,:contrasena,:nombre,:email)';
$stmt = $db->prepare($sqlCmd);
$stmt->bindParam(':username', $usuario);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->execute();


header('Location: ../login.html');

*/

 ?>
