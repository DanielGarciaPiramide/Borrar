<?php
require_once __DIR__ . '/../dao/CategoriaDAO.php';

class CategoriaController {
    private $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function listarCategorias() {
        return $this->categoriaDAO->getAllCategorias();
    }
}
?>
 