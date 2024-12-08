<?php
require_once 'includes/funciones.php';

$productos = obtenerProductos();
if (!$productos) {
    $productos = []; 
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>
        <a href="crear.php" class="btn">Nuevo Producto</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th>Fecha Agregado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['id']); ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
                    <td><?php echo htmlspecialchars($producto['precio']); ?></td>
                    <td><?php echo htmlspecialchars($producto['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($producto['proveedor']); ?></td>
                    <td><?php echo htmlspecialchars($producto['fecha_agregado']); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $producto['id']; ?>" onclick="return confirm('¿Está seguro?')">Editar</a>                          
                        <a href="eliminar.php?id=<?php echo $producto['id']; ?>" 
                            onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="js/sweetalert.js"></script>
    <?php if (isset($_GET['mensaje']) && isset($_GET['tipo'])): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: '<?php echo htmlspecialchars($_GET['mensaje']); ?>',
        icon: '<?php echo htmlspecialchars($_GET['tipo']); ?>', 
        confirmButtonText: 'Aceptar'
    });
</script>

<?php endif; ?>

        

</body>
</html>
