<?php
require_once '../static/php/conexion.php';

// Verificar si la conexión a la base de datos se realizó con éxito
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    // Obtener los datos del usuario y la contraseña de la URL
    $usuario = $_GET['usuario'];
    $clave = hash('sha256', $_GET['clave']); // Ocultar la clave mediante hash

    // Preparar la consulta para verificar las credenciales del usuario
    $consulta_login = "SELECT * FROM Empleado WHERE Usuario = '$usuario' AND Contraseña = '$clave'";
    $resultado_login = mysqli_query($conn, $consulta_login);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if (mysqli_num_rows($resultado_login) > 0) {
        echo "Inicio de sesión exitoso.";
        // Redirigir a carta.html
        header('Location: carta.html');
        exit;
    } else {
        echo "Error: usuario o contraseña incorrectos.";
        // Redirigir a carta.html con el mensaje de error
        header('Location: carta.html?error=' . urlencode("Usuario o contraseña incorrectos"));
        exit;
    }
}
?>

<?php
// Datos de conexión a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$contrasena = '123';
$base_datos = 'restaurante';

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexion
if (!$conexion) {
    // Si la conexión falla, muestra un mensaje de error
    die("Error en la conexion: " . mysqli_connect_error());
} else {
    // Si la conexión es exitosa, muestra un mensaje de éxito
    echo "Conexion exitosa a la base de datos '$base_datos'";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
