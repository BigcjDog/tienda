<?php
require_once 'includes/funciones.php';

$value = isset($producto['nombre_producto']) ? htmlspecialchars($producto['nombre_producto']) : '';


$mensaje = '';
$usuario = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = obtenerProductos();
    
    if (!$usuario) {
        header('Location: index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $nombre_producto = $_POST['nombre_producto'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $proveedor = $_POST['proveedor'] ?? '';
    $fecha_agregado = $_POST['fecha_agregado'] ?? '';
    
    if (actualizarProducto($id, $nombre_producto, $categoria, $precio, $cantidad, $proveedor, $fecha_agregado)) {
        header('Location: index.php?mensaje=Registro+editado+exitosamente&tipo=success');
        exit;
    } else {
        $mensaje = 'Location: index.php?mensaje=Error+al+editar+el+registro&tipo=danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <?php if ($mensaje): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
        <?php if ($usuario): ?>
        <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <label>Nombre del producto:</label>
                <input type="text" name="nombre_producto" value="<?php echo isset($producto['nombre_producto']) ? htmlspecialchars($producto['nombre_producto']) : ''; ?>" required>
            </div>
            <div>
                <label>Categoría:</label>
                <input type="text" name="categoria" value="<?php echo isset($producto['categoria']) ? htmlspecialchars($producto['categoria']) : ''; ?>" required>
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="precio" value="<?php echo isset($producto['precio']) ? htmlspecialchars($producto['precio']) : ''; ?>" step="0.01" required>
            </div>
            <div>
                <label>Cantidad:</label>
                <input type="number" name="cantidad" value="<?php echo isset($producto['cantidad']) ? htmlspecialchars($producto['cantidad']) : ''; ?>" required>
            </div>
            <div>
                <label>Proveedor:</label>
                <input type="text" name="proveedor" value="<?php echo isset($producto['proveedor']) ? htmlspecialchars($producto['proveedor']) : ''; ?>" required>
            </div>
            <div>
                <label>Fecha de agregado:</label>
                <input type="date" name="fecha_agregado" value="<?php echo isset($producto['fecha_agregado']) ? htmlspecialchars($producto['fecha_agregado']) : ''; ?>" required>              
            </div>
            <button type="submit">Actualizar</button>
            <a href="index.php" class="btn">Cancelar</a>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>