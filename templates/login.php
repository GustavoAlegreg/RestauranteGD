<?php
require_once '../static/php/conexion.php';

function iniciarSesion($conn) {
    if (isset($_POST['iniciar_sesion'])) {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave']; 

        $sql = "SELECT * FROM cliente WHERE Usuario = ?"; // Asegúrate de que "Usuario" esté correcto
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
            var_dump($fila); // Para depuración

            // Cambiar "contraseña" a "Contraseña"
            if (isset($fila['Contraseña'])) { 
                $clave_hasheada = hash('sha256', $clave);
                if ($clave_hasheada === $fila['Contraseña']) { // Cambia aquí también
                    header("Location: ../templates/principal.php");
                    exit();
                } else {
                    echo "Error: La contraseña proporcionada es incorrecta.";
                }
            } else {
                echo "Error: No se encontró la contraseña en la base de datos.";
            }
        } else {
            echo "Error: El nombre de usuario proporcionado no se encuentra en la base de datos.";
        }
    } else {
        echo "Error: No se proporcionaron credenciales válidas.";
    }
}



// Función para el registro de usuario con contraseña hasheada con SHA-256
function registrarUsuario($conn) {
    if (isset($_POST['registro'])) {
        $nuevo_usuario = $_POST['nuevo_usuario'];
        $nueva_clave = hash('sha256', $_POST['nueva_clave']); // Hasheando la contraseña antes de insertarla en la base de datos
        
        // Obtener los datos adicionales
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];

        // Modificar la consulta SQL para incluir los nuevos campos
        $sql = "INSERT INTO cliente (usuario, contraseña, nombre, apellidopaterno, dni) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nuevo_usuario, $nueva_clave, $nombre, $apellidos, $dni);
        
        if ($stmt->execute()) {
            echo "Registro de usuario exitoso. Puedes iniciar sesión ahora.";
        } else {
            if ($stmt->errno == 1062) {
                echo "Error: El nombre de usuario ya existe en la base de datos.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    } else {
        echo "Error: No se proporcionaron credenciales válidas para el registro.";
    }
}

// Relacionando las funciones con los botones
if (isset($_POST['iniciar_sesion'])) {
    iniciarSesion($conn);
}

if (isset($_POST['registro'])) {
    registrarUsuario($conn);
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
