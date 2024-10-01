<?php
require_once __DIR__ . '/../dao/ProductoDAO.php';

class ProductoController {
    private $productoDAO;

    public function __construct() {
        $this->productoDAO = new ProductoDAO();
    }

    public function listarProductos($filtros = []) {
        $productos = $this->productoDAO->getAllProductos();

        if (!empty($filtros['categoria'])) {
            $productos = $this->productoDAO->getProductosByCategoria($filtros['categoria']);
        }

        if (!empty($filtros['nombre'])) {
            $productos = $this->productoDAO->getProductosByNombre($filtros['nombre']);
        }

        if (!empty($filtros['orden_precio'])) {
            $productos = $this->productoDAO->getProductosOrdenadosPorPrecio($filtros['orden_precio']);
        }

        return $productos;
    }

    public function addProducto($nombre, $descripcion, $categoria, $precio, $destacado) {
        $this->productoDAO->addProducto($nombre, $descripcion, $categoria, $precio, $destacado);
    }

    public function listarDestacados() {
        return $this->productoDAO->getDestacados();
    }
}
?>
