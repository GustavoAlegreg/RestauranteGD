<?php
require_once __DIR__ . '../app/models/Productos.php';

// Clase CartaDAO para interactuar con la base de datos de productos
class CartaDAO {
    private $db;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para obtener todos los productos de la base de datos
    public function getProducts() {
        $query = "SELECT * FROM productos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un producto específico por su ID
    public function getProductById($id) {
        $query = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>