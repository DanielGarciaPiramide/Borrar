<?php
require_once __DIR__ . '/../model/Producto.php';

class ProductoDAO {
    private $productos = [];

    public function __construct() {
        $this->productos[] = new Producto(1, "Producto 1", "Descripción del producto 1", "Electrónica", 100, true);
        $this->productos[] = new Producto(3, "Producto 3", "Descripción del producto 3", "Juguetes", 30, true);
    }

    public function getAllProductos() {
        return $this->productos;
    }

    public function getProductosByCategoria($categoria) {
        return array_filter($this->productos, function($producto) use ($categoria) {
            return $producto->categoria === $categoria;
        });
    }
   public function getProductosByNombre($nombre) {
    $productosFiltrados = [];
    
    foreach ($this->productos as $producto) {
        if (stripos($producto->nombre, $nombre) !== false) {
            $productosFiltrados[] = $producto;
        }
    }
    
    return $productosFiltrados;
}


    public function getProductosOrdenadosPorPrecio($orden = 'asc') {
        usort($this->productos, function($a, $b) use ($orden) {
            if ($orden === 'asc') {
                return $a->precio > $b->precio;
            } else {
                return $a->precio < $b->precio;
            }
        });
        return $this->productos;
    }

    public function addProducto($nombre, $descripcion, $categoria, $precio, $destacado) {

        $this->productos[] = new Producto(rand(1,100), $nombre, $descripcion, $categoria, $precio, $destacado);

    }

 public function getDestacados() {
    $productosDestacados = [];
    
    foreach ($this->productos as $producto) {
        if ($producto->destacado) {
            
            array_push($productosDestacados,$producto);
           
        }
    }
    return $productosDestacados;
}

}
?>
