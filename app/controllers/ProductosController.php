<?php
header('Content-Type: application/json');

// Conectar a la base de datos
require_once '../app/models/Productos.php';
require_once '../app/dao/ProductosDAO.php';

$productosDAO = new ProductosDAO();
$productos = $productosDAO->all();

// Convertir los objetos de productos a un arreglo asociativo para JSON
$productosArray = [];
foreach ($productos as $producto) {
    $productosArray[] = [
        'id' => $producto->getId_prod(),
        'nombre_prod' => $producto->getNombre_prod(),
        'descripcion' => $producto->getDescripcion(),
        'precio' => $producto->getPrecio(),
        'foto_prod' => $producto->getFoto_prod(),
        'idCategoria' => $producto->getIdCategoria()
    ];
}

// Devolver los productos como JSON
echo json_encode($productosArray);
?>