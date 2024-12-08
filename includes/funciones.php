<?php
require_once __DIR__ . '/../config/database.php';

// CREATE - Insertar un nuevo producto
function crearProducto($nombre_producto, $categoria, $precio, $cantidad, $proveedor, $fecha_agregado) {
    try {
        $conn = conectarDB();
        $sql = "INSERT INTO productos (nombre_producto, categoria, precio, cantidad, proveedor, fecha_agregado) 
                VALUES (:nombre_producto, :categoria, :precio, :cantidad, :proveedor, :fecha_agregado)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':proveedor', $proveedor);
        $stmt->bindParam(':fecha_agregado', $fecha_agregado);
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        echo "Error al crear: " . $e->getMessage();
        return false;
    }
}

// READ - Obtener todos los productos
function obtenerProductos() {
    try {
        $conn = conectarDB();
        $sql = "SELECT * FROM productos";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; 
    } catch(PDOException $e) {
        echo "Error al leer: " . $e->getMessage();
        return [];
    }
}
// READ - Obtener un producto específico
function obtenerProducto($id) {
    try {
        $conn = conectarDB();
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: []; // Devolver un array vacío si no encuentra nada
    } catch(PDOException $e) {
        echo "Error al leer: " . $e->getMessage();
        return [];
    }
}


// UPDATE - Actualizar un producto
function actualizarProducto($id, $nombre_producto, $categoria, $precio, $cantidad, $proveedor, $fecha_agregado) {
    try {
        $conn = conectarDB();
        $sql = "UPDATE productos 
                SET nombre_producto = :nombre_producto, categoria = :categoria, precio = :precio, 
                    cantidad = :cantidad, proveedor = :proveedor, fecha_agregado = :fecha_agregado 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':proveedor', $proveedor);
        $stmt->bindParam(':fecha_agregado', $fecha_agregado);
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}

// DELETE - Eliminar un producto
function eliminarProducto($id) {
    try {
        $conn = conectarDB();
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
        return false;
    }
}
