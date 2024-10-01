<?php
class Producto {
    public $id;
    public $nombre;
    public $descripcion;
    public $categoria;
    public $precio;
    public $destacado;

    public function __construct($id, $nombre, $descripcion, $categoria, $precio, $destacado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->destacado = $destacado;
    }
}
?>
