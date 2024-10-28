<?php
class Usuario {
    private $usuario;
    private $clave;
    private $nombre;
    private $apellidos;
    private $dni;

    public function __construct($usuario, $clave, $nombre, $apellidos, $dni) {
        $this->setUsuario($usuario);
        $this->setClave($clave);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setDni($dni);
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }
}
?>