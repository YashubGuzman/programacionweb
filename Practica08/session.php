<?php

session_start();

if (!$_SESSION['usuario_id']) {
    header('Location: ' . APP_ROOT . 'login.html');
    exit();
}
