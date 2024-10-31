<?php
class Productos {
    private $id_prod;
    private $nombre_prod;
    private $precio;
    private $descripcion;
    private $cantidad;
    private $idCategoria;
    private $idTipo;
    private $foto_prod;

    public function __construct($id_prod, $nombre_prod, $precio, $descripcion, $cantidad, $idCategoria, $idTipo, $foto_prod) {
        $this->id_prod = $id_prod;
        $this->nombre_prod = $nombre_prod;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
        $this->idCategoria = $idCategoria;
        $this->idTipo = $idTipo;
        $this->foto_prod = $foto_prod;
    }

    public function getId_prod() {
        return $this->id_prod;
    }

    public function getNombre_prod() {
        return $this->nombre_prod;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getFoto_prod() {
        return $this->foto_prod;
    }
}
?>