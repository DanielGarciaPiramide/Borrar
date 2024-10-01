<?php
require_once __DIR__ . '/../controller/ProductoController.php';
require_once __DIR__ . '/../controller/CategoriaController.php';

$productoController = new ProductoController();
$categoriaController = new CategoriaController();

$categoria = $_GET['categoria'];
$nombre = $_GET['nombre'];
$orden_precio = $_GET['orden_precio'];
$filtros = [
    'categoria' => $categoria,
    'nombre' => $nombre,
    'orden_precio' => $orden_precio
];
$productos = $productoController->listarProductos($filtros);
$categorias = $categoriaController->listarCategorias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <h1>Listado de Productos</h1>
    
    <form method="GET" action="busquedaFiltrada.php">
        <input type="text" name="nombre" placeholder="Buscar por nombre" value="<?php echo $nombre; ?>">
        <select name="categoria">
            <option value="">Todas las Categorías</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?php echo $cat->nombre; ?>" <?php if ($cat->nombre == $categoria) echo 'selected'; ?>>
                    <?php echo $cat->nombre; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="orden_precio">
            <option value="asc" <?php if ($orden_precio == 'asc') echo 'selected'; ?>>Precio Ascendente</option>
            <option value="desc" <?php if ($orden_precio == 'desc') echo 'selected'; ?>>Precio Descendente</option>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <div class="productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto">
                <h3><?php echo $producto->nombre; ?></h3>
                <p><?php echo $producto->descripcion; ?></p>
                <p><strong>Precio:</strong> $<?php echo $producto->precio; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
