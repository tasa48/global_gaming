<?php
// Conexión a la base de datos
include '../modelo/conexion_bd.php';

// Obtener el código del producto desde la URL
if (isset($_GET['prod_codigo'])) {
    $prod_codigo = intval($_GET['prod_codigo']);

    // Consultar el producto en la base de datos
    $query = "SELECT * FROM producto WHERE prod_codigo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $prod_codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el producto
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "No se ha especificado un producto.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($producto['prod_nombre']); ?></h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Imagen del producto -->
                <img src="<?php echo !empty($producto['prod_imagen']) ? 'img/prod-fotos/' . $producto['prod_imagen'] : 'img/default.png'; ?>" 
                     class="img-fluid" alt="<?php echo htmlspecialchars($producto['prod_nombre']); ?>">
            </div>
            <div class="col-md-6">
                <h2>Precio: $<?php echo number_format($producto['prod_precioventa'], 2); ?></h2>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['prod_descripcion']); ?></p>
                <p><strong>Stock:</strong> <?php echo intval($producto['prod_stock']); ?> unidades</p>

                <!-- Botón para confirmar compra -->
                <form action="procesar-compra.php" method="POST">
                    <input type="hidden" name="prod_codigo" value="<?php echo $producto['prod_codigo']; ?>">
                    <button type="submit" class="btn btn-success">Confirmar compra</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
