<?php
require_once 'includes/funciones.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if (eliminarProducto($id)) {
        header('Location: index.php?mensaje=Registro+eliminado+exitosamente&tipo=success');
    } else {
        header('Location: index.php?mensaje=Error+al+eliminar+el+registro&tipo=error');
    }
    exit;
} else {
    header('Location: index.php?mensaje=ID+no+válido&tipo=warning');
    exit;
}
?>
