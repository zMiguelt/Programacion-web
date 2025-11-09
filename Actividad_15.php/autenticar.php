<?php
session_start();

$usuario_valido = 'admin';
$clave_valida = 'churro123';

if (empty($_POST['nombre_usuario']) || empty($_POST['clave_acceso']) || empty($_POST['color_texto'])) {
    header('Location: login.php?error=vacio');
    exit;
}

$nombre_usuario = $_POST['nombre_usuario'];
$clave_acceso = $_POST['clave_acceso'];
$color_elegido = $_POST['color_texto'];


if ($nombre_usuario === $usuario_valido && $clave_acceso === $clave_valida) {

    $_SESSION['autenticado'] = true;
    $_SESSION['usuario'] = $nombre_usuario;
    $_SESSION['color_preferido'] = $color_elegido;
    

    header('Location: inicio.php');
    exit;
} else {

    header('Location: login.php?error=credenciales');
    exit;
}
?>