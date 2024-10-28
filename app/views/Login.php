<!--
<DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php
    //if (!session_id()) {
    //    session_start();
    //}
    //if (isset($_SESSION['error'])) {
    //    echo '<p style="color:red">' . $_SESSION['error'] . '</p>';
    //    unset($_SESSION['error']);
    //}
    ?>
    <form action="/public/index.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html-->

<?php
require_once '../../static/php/conexion.php';
require_once '../../app/controllers/UsuarioController.php';

$usuarioController = new UsuarioController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['iniciar_sesion'])) {
        $mensaje = $usuarioController->iniciarSesion($_POST['usuario'], $_POST['clave']);
    } elseif (isset($_POST['registro'])) {
        $nuevo_usuario = new Usuario($_POST['nuevo_usuario'], $_POST['nueva_clave'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni']);
        $mensaje = $usuarioController->registrarUsuario($nuevo_usuario);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
    
    <div class="registro-container login">
        <form action="login.php" method="post" class="registro-form">
            <h1>¡Hola!</h1>
            <hr>
            <p>Ingresa tus datos</p>
            <div class="input-box registro-input-box">
                <label for="usuario">Nombre de usuario:</label>
                <input type="text" id="usuario" name="usuario" class="registro-input" placeholder="Nombre de usuario" required />
                <h5>Ejemplo: user123 (nombre de usuario)</h5>
            </div>
            <div class="input-box registro-input-box">
                <label for="clave">Contraseña:</label>
                <input type="password" id="clave" name="clave" class="registro-input" placeholder="Contraseña" required />
            </div>
            <div class="remember-forgot">
                <a href="#">Restablecer contraseña</a>
            </div>
            <input type="submit" value="Iniciar Sesión" class="login-submit" name="iniciar_sesion">
            <button class="toggle-login btn1" onclick="toggleLogin()">Registrarse</button>
        </form>
    </div>

    <div class="registro-container registro">
        <form action="login.php" method="post" class="registro-form">
            <h1>¡Registra tu cuenta!</h1>
            <hr>
            <p>Ingresa tus datos para registrarte</p>
            <div class="input-box registro-input-box">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input registro-input" placeholder="Tu nombre" required />
            </div>

            <div class="input-box registro-input-box">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="input registro-input" placeholder="Tus apellidos" required />
            </div>

            <div class="input-box registro-input-box">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" class="input registro-input" placeholder="Tu DNI" required />
            </div>

            <div class="input-box registro-input-box">
                <label for="nuevo_usuario">Nombre de usuario:</label>
                <input type="text" id="nuevo_usuario" name="nuevo_usuario" class="input registro-input" placeholder="Nombre de usuario nuevo" required />
                <h5>Ejemplo: user123 (nombre de usuario)</h5>
            </div>

            <div class="input-box registro-input-box">
                <label for="nueva_clave">Contraseña:</label>
                <input type="password" id="nueva_clave" name="nueva_clave" class="login-input registro-input" placeholder="Contraseña nueva" required />
            </div>

            <div class="remember-forgot registro-remember-forgot">
                <a href="#">¿Ya tienes cuenta?</a>
            </div>
      
            <input type="submit" value="Registrarse" class="login-submit registro-submit" name="registro">
            <button class="toggle-registro btn1 registro-toggle" onclick="toggleLogin()">Iniciar Sesión</button>
        </form>    
    </div>
</body>
</html>