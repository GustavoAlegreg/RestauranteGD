<?php
require_once '../../app/models/Productos.php';
require_once '../../config/db.php';

class ProductosDAO {
    private $conexion;

    public function __construct() {
        $database = new Database();
        $this->conexion = $database->getConnection();
    }

    public function all() {
        // Seleccionar solo las columnas necesarias
        $query = 'SELECT IDProducto, NomProducto, PrecioUnitario, FotoProducto, Descripcion, Cantidad, IDCategoria, IDTipo FROM producto';
        $stmt = $this->conexion->prepare($query);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return [];
        }

        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un objeto de Productos con los datos específicos
            $producto = new Productos(
                $row['IDProducto'],
                $row['NomProducto'],
                $row['Descripcion'],
                $row['PrecioUnitario'],
                $row['Cantidad'],
                $row['IDCategoria'],
                $row['IDTipo'],
                $row['FotoProducto']
            );
            $productos[] = $producto;
        }

        // Convertir los objetos de productos a un arreglo asociativo para JSON
        $productosArray = [];
        foreach ($productos as $producto) {
            $productosArray[] = [
                'id' => $producto->getId_prod(), // Asegúrate de que el método se llame correctamente
                'nombre_prod' => $producto->getNombre_prod(),
                'descripcion' => $producto->getDescripcion(),
                'precio' => $producto->getPrecio(),
                'foto_prod' => $producto->getFoto_prod(),
                'idCategoria' => $producto->getIdCategoria(),
                'idTipo' => $producto->getIdTipo() // Agregar el IDTipo si es necesario
            ];
        }

        return $productosArray;
    }
}
?>
