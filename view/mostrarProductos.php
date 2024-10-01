<?php
require_once __DIR__ . '/../controller/ProductoController.php';
$productoController = new ProductoController();
$destacados = $productoController->listarDestacados();
$nombre = $_POST['nombre']??null;
if($nombre !== null){
array_push($destacados , new Producto(rand(1, 100), $nombre, $descripcion = $_POST['descripcion'], $categoria = $_POST['categoria'], $precio = $_POST['precio'],  $destacado = $_POST['destacado']));
}
?>
    <div class="productos">
        <?php
            foreach ($destacados as $producto) {
                echo("<div class=\"producto\">");
                
                
                    echo ("<h3>{$producto->nombre}</h3>"); 
                    echo ("<p>{$producto->descripcion}</p>"); 
                    echo ("<p>Precio: {$producto->precio}</p>"); 
                
            
                echo("</div>");
            }
        ?>
    </div>
