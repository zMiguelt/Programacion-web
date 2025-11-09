<?php
session_start();

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header('Location: inicio.php');
    exit;
}

$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Sessione/Cookies</title>
    <style>
        body { font-family: sans-serif; }
        .mensaje-error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php if ($error === 'vacio'): ?>
        <p class="mensaje-error">¡Ups! Tienes que llenar todos los campos.</p>
    <?php elseif ($error === 'credenciales'): ?>
        <p class="mensaje-error">El usuario o la contraseña son incorrectos. Inténtalo de nuevo.</p>
    <?php endif; ?>

    <form action="autenticar.php" method="POST">
        <label for="nombre_usuario"> Usuario:</label><br>
        <input type="text" id="nombre_usuario" name="nombre_usuario"><br><br>

        <label for="clave_acceso"> Contraseña:</label><br>
        <input type="password" id="clave_acceso" name="clave_acceso"><br><br>

        <label for="color_texto"> Elige tu color:</label><br>
        <select id="color_texto" name="color_texto">
            <option value="blue" selected>Azul</option>
            <option value="green">Verde</option>
            <option value="red">Rojo</option>
            <option value="purple">Púrpura</option>
        </select><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>