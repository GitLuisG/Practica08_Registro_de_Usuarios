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
$db = getPDO();
$stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
$stmt->bindParam(':username', $usuario);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);

if ($r) {
    
    if ($r['password'] === $contrasena) {
        session_start();
        $_SESSION['usuario_id'] = (int)$r['id'];
        $_SESSION['usuario_username'] = $r['username'];
        $_SESSION['usuario_nombre'] = $r['name'];
        $_SESSION['usuario_correo'] = $r['email'];
        header('Location: ../practica08/');
        exit();
    }

}

header('Location: login.html');
