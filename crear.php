<?php
require_once 'includes/funciones.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre_producto'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $proveedor = $_POST['proveedor'] ?? '';
    $fecha_agregado = $_POST['fecha_agregado'] ?? '';
    
    if (crearProducto($nombre_producto, $categoria, $precio, $cantidad, $proveedor, $fecha_agregado)) {
        header('Location: index.php?mensaje=Registro+agregado+exitosamente&tipo=success');
    } else {
        header('Location: index.php?mensaje=Error+al+agregar+el+registro&tipo=error');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo producto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Nuevo producto</h1>
        <?php if ($mensaje): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
        <form method="POST">
            <div>
                <label>Nombre del producto:</label>
                <input type="text" name="nombre_producto" required>
            </div>
            <div>
                <label>Categoría:</label>
                <input type="text" name="categoria" required>
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="precio" step="0.01" required>
            </div>
            <div>
                <label>Cantidad:</label>
                <input type="number" name="cantidad" required>
            </div>
            <div>
                <label>Proveedor:</label>
                <input type="text" name="proveedor" required>
            </div>
            <div>
                <label>Fecha de agregado:</label>
                <input type="date" name="fecha_agregado" required>
            </div>
            <button type="submit">Guardar</button>
            <a href="index.php" class="btn">Cancelar</a>
        </form>
    </div>
</body>
</html>