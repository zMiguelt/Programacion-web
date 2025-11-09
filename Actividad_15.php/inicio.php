<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php');
    exit;
}

$color_texto = $_SESSION['color_preferido'] ?? 'black';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <style>
        body { font-family: sans-serif; color: <?php echo htmlspecialchars($color_texto); ?>; }
        .cerrar-sesion { font-weight: bold; margin-top: 20px; display: block; color: gray; }
    </style>
</head>
<body>
    <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has elegido el color "<?php echo htmlspecialchars($color_texto); ?>" para ver.</p>

    <h2>Opciones de Navegación Autenticada</h2>
    
    <ul>
        <li><a href="contador_sesiones.php" style="color: <?php echo htmlspecialchars($color_texto); ?>;">Contador de Sesiones</a></li>
        <li><a href="contador_cookies.php" style="color: <?php echo htmlspecialchars($color_texto); ?>;">Contador de Cookies</a></li>
    </ul>

    <a href="cerrar_sesion.php" class="cerrar-sesion">Cerrar Sesión</a>
</body>
</html>