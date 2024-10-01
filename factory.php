<?php
require_once __DIR__ . '/controller/ProductoController.php';
require_once __DIR__ . '/controller/CategoriaController.php';

class Factory {
    public static function getProductoController() {
        return new ProductoController();
    }

    public static function getCategoriaController() {
        return new CategoriaController();
    }
}
?>
