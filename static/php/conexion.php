<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "galegre";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
} elseif ($conn->connect_errno == 1049) {
  die("La base de datos no existe");
} elseif ($conn->connect_errno == 1045) {
  die("Acceso denegado, revise su usuario y contraseña");
} elseif ($conn->connect_errno == 2002) {
  die("No se puede conectar al servidor, revise su servidor y puerto");
} else {
  echo "Conexión exitosa";
}
?>


