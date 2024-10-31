<?php
require_once '../../static/php/conexion.php';
require_once '../../app/models/Usuario.php';

class UsuarioDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerUsuario($usuario) {
        $sql = "SELECT * FROM cliente WHERE Usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function registrarUsuario(Usuario $usuario) {
        $clave_hasheada = hash('sha256', $usuario->clave);
        $sql = "INSERT INTO cliente (usuario, contraseña, nombre, apellidopaterno, dni) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $usuario->usuario, $clave_hasheada, $usuario->nombre, $usuario->apellidos, $usuario->dni);
        return $stmt->execute();
    }
}
?>