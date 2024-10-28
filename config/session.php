<?php

// Clase para manejo de sesiones
class Session {
    // Método para crear una sesión
    public static function crearSession($clave, $valor) {
        // Asigna un valor a una clave específica en la sesión
        $_SESSION[$clave] = $valor;
    }

    // Método para obtener el valor de una sesión
    public static function obtenerSession($clave) {
        // Verifica si la clave existe en la sesión y devuelve su valor, de lo contrario devuelve null
        return isset($_SESSION[$clave]) ? $_SESSION[$clave] : null;
    }

    // Método para destruir una sesión específica
    public static function destruirSession($clave) {
        // Elimina una clave específica de la sesión
        unset($_SESSION[$clave]);
    }

    // Método para iniciar una sesión
    public static function iniciarSession() {
        // Inicia una sesión
        session_start();
    }

    // Método para cerrar una sesión
    public static function cerrarSession() {
        // Destruye toda la sesión
        session_destroy();
    }
}

?>