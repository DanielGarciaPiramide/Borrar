<?php
require_once __DIR__ . '/../controller/ProductoController.php';
require_once __DIR__ . '/../controller/CategoriaController.php';

$categoriaController = new CategoriaController();
$categorias = $categoriaController->listarCategorias();

if ($_POST) {
    $productoController = new ProductoController();
    $productoController->addProducto(
        $_POST['nombre'], 
        $_POST['descripcion'], 
        $_POST['categoria'], 
        $_POST['precio'], 
        $_POST['destacado']??null !== null
    );
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Producto</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <h1>Producto Nuevo:</h1>
    <form method="POST" action="index.php">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input name="descripcion" placeholder="Descripción" required></input>

        <select name="categoria">

            <?php 
                foreach ($categorias as $cat){
                    echo("<option value=\"{$cat->nombre}\">{$cat->nombre}</option>"); 
                }
            ?>


        </select>
        
        <input type="number" name="precio" placeholder="Precio" required>

        <label>
            <input type="checkbox" name="destacado"> Producto destacado
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
