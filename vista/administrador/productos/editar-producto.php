<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../vista/formulario-login.php");
    exit();
}
include '../../../modelo/conexion_bd.php'; // Ajusta la ruta según sea necesario

// Consultar todos los productos para mostrar en el select
$sql = "SELECT prod_codigo, prod_nombre FROM producto";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Admin Global Gaming</title>
    <link rel="stylesheet" href="../../../vista/css/bootstrap.css">
    <link rel="stylesheet" href="../../../vista/css/admind.css">
    <link rel="icon" href="../img/G-icon.ico">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../admin-dashboard.php" style="text-decoration: none;">Inicio</a></li>
                <li><a href="../productos/index-producto.php" style="text-decoration: none;">Productos</a></li>
                <a class="nav-link-right" href="../controlador/cerrar_sesion.php" style="text-decoration: none;">Cerrar sesión</a>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form-container mt-5">
            <h2>Seleccionar Producto para Editar</h2>
            <form action="editar-producto.php" method="GET">
                <div class="form-group">
                    <label for="prod_codigo">Seleccione un Producto:</label>
                    <select name="prod_codigo" id="prod_codigo" class="form-control">
                        <option value="">Selecciona un Producto</option>
                        <?php while($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['prod_codigo']; ?>">
                                <?php echo $row['prod_nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Seleccionar</button>
            </form>

            <?php
            if (isset($_GET['prod_codigo']) && !empty($_GET['prod_codigo'])) {
                $codigo = $_GET['prod_codigo'];

                // Obtener los detalles del producto seleccionado
                $sql = "SELECT * FROM producto WHERE prod_codigo = $codigo";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $producto = $result->fetch_assoc();
                    ?>

                    <h3>Editar Información del Producto</h3>
                    <form action="../../../controlador/productos.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prod_codigo" value="<?php echo $producto['prod_codigo']; ?>">
                        
                        <div class="form-group">
                            <label for="prod_nombre">Nombre del Producto:</label>
                            <input type="text" class="form-control" id="prod_nombre" name="prod_nombre" value="<?php echo $producto['prod_nombre']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prod_precioventa">Precio de Venta:</label>
                            <input type="text" class="form-control" id="prod_precioventa" name="prod_precioventa" value="<?php echo $producto['prod_precioventa']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prod_stock">Stock:</label>
                            <input type="text" class="form-control" id="prod_stock" name="prod_stock" value="<?php echo $producto['prod_stock']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prod_unidaddemedida">Unidad de Medida:</label>
                            <select class="form-control" id="prod_unidaddemedida" name="prod_unidaddemedida" required>
                                <option value="">Selecciona una unidad de medida</option>
                                <option value="unidad" <?php echo ($producto['prod_unidaddemedida'] == 'unidad') ? 'selected' : ''; ?>>Unidad</option>
                                <option value="kilogramos" <?php echo ($producto['prod_unidaddemedida'] == 'kilogramos') ? 'selected' : ''; ?>>Kilogramos</option>
                                <option value="litros" <?php echo ($producto['prod_unidaddemedida'] == 'litros') ? 'selected' : ''; ?>>Litros</option>
                                <!-- Agrega más opciones si es necesario -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prod_descripcion">Descripción:</label>
                            <textarea class="form-control" id="prod_descripcion" name="prod_descripcion" rows="4" style="resize: none;" required><?php echo $producto['prod_descripcion']; ?></textarea>
                        </div>

                        <!-- Nuevo campo para cargar la imagen -->
                        <div class="form-group">
                            <label for="prod_imagen">Imagen del Producto (opcional):</label>
                            <input type="file" class="form-control-file" id="prod_imagen" name="prod_imagen">
                            <?php if (!empty($producto['prod_imagen'])): ?>
                                <p>Imagen actual:</p>
                                <img src="../../../img/prod-fotos/<?php echo $producto['prod_imagen']; ?>" alt="<?php echo $producto['prod_nombre']; ?>" style="max-width: 150px;">
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                    <?php
                } else {
                    echo '<div class="alert alert-danger" role="alert">No se encontró el producto seleccionado.</div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">Por favor, selecciona un producto.</div>';
            }
            $conn->close();
            ?>
        </div>
    </main>

    <footer class="text-center mt-5">
        <p>© 2024 Panel de administrador Global Gaming</p>
    </footer>

</body>
</html>