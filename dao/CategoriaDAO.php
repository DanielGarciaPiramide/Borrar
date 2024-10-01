<?php
require_once __DIR__ . '/../model/Categoria.php';

class CategoriaDAO {
    private $categorias = [];

    public function __construct() {
        
        $this->categorias[] = new Categoria("Electrónica");
        $this->categorias[] = new Categoria("Hogar");
        $this->categorias[] = new Categoria("Juguetes");
        $this->categorias[] = new Categoria("Ropa");
    }

    public function getAllCategorias() {
        return $this->categorias;
    }
}
?>
