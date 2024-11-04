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
}

// Obtener productos
$sql = "SELECT * FROM producto";
$result = $conn->query($sql);

$productos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Obtener categorías
$sqlCategorias = "SELECT * FROM categoriaproducto";
$resultCategorias = $conn->query($sqlCategorias);
$categorias = []; // Inicializa un array para almacenar las categorías

if ($resultCategorias->num_rows > 0) {
    while($categoria = $resultCategorias->fetch_assoc()) {
        $categorias[] = $categoria; // Almacena cada categoría en el array
    }
} else {
    echo "No se encontraron categorías.<br>";
}

// Obtener tipos
$sqlTipos = "SELECT * FROM tipoproducto";
$resultTipos = $conn->query($sqlTipos);
$tipos = []; // Inicializa un array para almacenar los tipos

if ($resultTipos->num_rows > 0) {
    while($tipo = $resultTipos->fetch_assoc()) {
        $tipos[] = $tipo; // Almacena cada tipo en el array
    }
} else {
    echo "No se encontraron tipos.<br>";
}


// Cerrar conexión
$conn->close();
?>
