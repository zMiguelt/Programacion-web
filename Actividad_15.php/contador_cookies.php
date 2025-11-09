<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php');
    exit;
}

$color_texto = $_SESSION['color_preferido'] ?? 'black';
$nombre_cookie = 'contador_cookie_visitas';
$tiempo_expiracion = time() + (86400 * 30); 

$visitas = 1;
if (isset($_COOKIE[$nombre_cookie])) {
    $visitas = (int)$_COOKIE[$nombre_cookie] + 1;
}

setcookie($nombre_cookie, $visitas, $tiempo_expiracion, "/");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador con Cookies</title>
    <style>
        body { font-family: sans-serif; color: <?php echo htmlspecialchars($color_texto); ?>; }
        .cerrar-sesion { font-weight: bold; margin-top: 20px; display: block; color: gray; }
        .contador { font-size: 2em; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Contador de Visitas (Usando Cookies)</h1>
    
    <p class="contador">Has visitado esta página <?php echo $visitas; ?> veces.</p>

    <p><a href="inicio.php" style="color: <?php echo htmlspecialchars($color_texto); ?>;">Volver al Inicio</a></p>

    <a href="cerrar_sesion.php" class="cerrar-sesion">Cerrar Sesión</a>
</body>
</html>