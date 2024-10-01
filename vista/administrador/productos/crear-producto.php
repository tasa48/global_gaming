<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../vista/formulario-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - Admin Global Gaming</title>
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

    <main class="container mt-5">
        <h2>Crear Nuevo Producto</h2>

        <!-- Atributo enctype añadido para permitir la carga de archivos -->
        <form action="../../../controlador/productos.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prod_nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="prod_nombre" name="prod_nombre" required>
            </div>

            <div class="form-group">
                <label for="prod_precioventa">Precio de Venta:</label>
                <input type="number" step="0.01" class="form-control" id="prod_precioventa" name="prod_precioventa" required>
            </div>

            <div class="form-group">
                <label for="prod_stock">Stock:</label>
                <input type="number" class="form-control" id="prod_stock" name="prod_stock" required>
            </div>

            <div class="form-group">
                <label for="prod_unidaddemedida">Unidad de Medida:</label>
                <input type="text" class="form-control" id="prod_unidaddemedida" name="prod_unidaddemedida" required>
            </div>

            <div class="form-group">
                <label for="prod_descripcion">Descripción:</label>
                <textarea class="form-control" id="prod_descripcion" name="prod_descripcion" rows="5" required></textarea>
            </div>

            <!-- Campo para subir la foto del producto -->
            <div class="form-group">
                <label for="prod_imagen">Foto del Producto:</label>
                <input type="file" class="form-control-file" id="prod_imagen" name="prod_imagen" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Producto</button>
        </form>
    </main>

    <footer class="text-center mt-5">
        <p>© 2024 Panel de administrador Global Gaming</p>
    </footer>
</body>
</html>

    