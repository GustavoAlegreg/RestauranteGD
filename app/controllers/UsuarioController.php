<?php
require_once '../dao/UsuarioDAO.php';

class UsuarioController {
    private $usuarioDAO;

    public function __construct($conn) {
        $this->usuarioDAO = new UsuarioDAO($conn);
    }

    public function iniciarSesion($usuario, $clave) {
        $fila = $this->usuarioDAO->obtenerUsuario($usuario);
        if ($fila && isset($fila['Contraseña'])) {
            $clave_hasheada = hash('sha256', $clave);
            if ($clave_hasheada === $fila['Contraseña']) {
                header("Location: ../../app/views/Carta.php");
                exit();
            } else {
                return "Error: La contraseña proporcionada es incorrecta.";
            }
        }
        return "Error: El nombre de usuario proporcionado no se encuentra en la base de datos.";
    }

    public function registrarUsuario($usuario) {
        if ($this->usuarioDAO->registrarUsuario($usuario)) {
            return "Registro de usuario exitoso. Puedes iniciar sesión ahora.";
        } else {
            return "Error: El nombre de usuario ya existe en la base de datos.";
        }
    }
}
?>