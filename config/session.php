<?php

// Clase para manejo de sesiones. 
//Esta clase proporciona métodos para crear, obtener, destruir y gestionar sesiones en la aplicación.
class Session {
    // Método para crear una sesión. Asigna un valor a una clave específica en la sesión.
    // Parámetros: $clave (string) - La clave de la sesión, $valor (string) - El valor de la sesión.
    public static function crearSesion($clave, $valor) {
        // Asigna un valor a una clave específica en la sesión
        $_SESSION[$clave] = $valor;
    }

    // Método para obtener el valor de una sesión. Verifica si la clave existe en la sesión y devuelve su valor, de lo contrario devuelve null.
    // Parámetros: $clave (string) - La clave de la sesión.
    public static function obtenerSesion($clave) {
        // Verifica si la clave existe en la sesión y devuelve su valor, de lo contrario devuelve null
        return isset($_SESSION[$clave]) ? $_SESSION[$clave] : null;
    }

    // Método para destruir una sesión específica. Elimina una clave específica de la sesión.
    // Parámetros: $clave (string) - La clave de la sesión.
    public static function destruirSesion($clave) {
        // Elimina una clave específica de la sesión
        unset($_SESSION[$clave]);
    }

    // Método para iniciar una sesión. Inicia una sesión en el servidor.
    public static function iniciarSesion() {
        // Inicia una sesión
        session_start();
    }

    // Método para cerrar una sesión. Destruye toda la sesión.
    public static function cerrarSesion() {
        // Destruye toda la sesión
        session_destroy();
    }
}

?>

<?php
// Inicia la sesión
Session::iniciarSesion();

// Función para verificar si hay una sesión activa. Verifica si el usuario está logueado.
function verificarSesion() {
    // Verifica si el usuario está logueado
    return Session::obtenerSesion('usuario') !== null;
}

// Función para guardar datos en la sesión. Guarda el nombre de usuario y el ID de sesión.
// Parámetros: $usuario (string) - El nombre de usuario.
function guardarDatosSesion($usuario) {
    // Guarda el nombre de usuario
    Session::crearSesion('usuario', $usuario);
    // Guarda el ID de sesión
    Session::crearSesion('dispositivo', session_id());
}

// Función para destruir la sesión. Cierra la sesión actual.
function destruirSesion() {
    // Cierra la sesión actual
    Session::cerrarSesion();
}
?>