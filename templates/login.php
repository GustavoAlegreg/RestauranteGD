<?php
require_once '../static/php/conexion.php';

// Verificar si la conexión a la base de datos se realizó con éxito
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión a la base de datos exitosa.";
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = hash('sha256', $_POST['clave']); // Ocultar la clave mediante hash

    // Redirigir a consulta_login.php para verificar las credenciales del usuario
    header('Location: consulta_login.php?usuario=' . urlencode($usuario) . '&clave=' . urlencode($clave));
    exit;
}

if (isset($_POST['registro'])) {
    $nuevo_usuario = $_POST['nuevo_usuario'];
    $nueva_clave = password_hash($_POST['nueva_clave'], PASSWORD_DEFAULT); // Encriptar la nueva contraseña mediante hash

    // Preparamos la consulta para insertar el nuevo usuario
    $consulta_registro = "INSERT INTO usuario (usuario, contraseña) VALUES ('$nuevo_usuario', '$nueva_clave')";
    $resultado_registro = mysqli_query($conn, $consulta_registro);

    if ($resultado_registro) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
        // Otra forma de redirigir a la página
        echo "<script>window.location = 'carta.html';</script>";
        exit;
    } else {
        echo "Error al registrar: " . mysqli_error($conn);
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
    <div class="login-container">
        <form action="login.php" method="post" class="login-form">
            <h2>Iniciar Sesión</h2>
            <input type="text" id="usuario" name="usuario" class="login-input" placeholder="Nombre de usuario"><br>
            <input type="password" id="clave" name="clave" class="login-input" placeholder="Contraseña"><br>
            <input type="submit" value="Iniciar Sesión" class="login-submit">
        </form>
        <form action="login.php" method="post" class="login-form">
            <h2>Registrarse</h2>
            <input type="text" id="nuevo_usuario" name="nuevo_usuario" class="login-input" placeholder="Nombre de usuario nuevo"><br>
            <input type="password" id="nueva_clave" name="nueva_clave" class="login-input" placeholder="Contraseña nueva"><br>
            <input type="submit" value="Registrarse" class="login-submit" name="registro">
        </form>
    </div>
</body>
</html>