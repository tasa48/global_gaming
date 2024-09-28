<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../vista/formulario-login.php");
    exit();
}

include '../../../modelo/conexion_bd.php';

$sql = "SELECT * FROM producto";
$result = $conn->query($sql);


if (isset($_GET['prod_codigo'])) {
    $codigo = $_GET['prod_codigo'];

    $sql = "SELECT prod_foto FROM producto WHERE prod_codigo = $codigo";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    header("Content-Type: image/png"); // Cambia el tipo de imagen según sea necesario (png, gif, etc.)
    echo $row['prod_foto'];
}   

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Global gaming</title>
    <link rel="stylesheet" href="../../../vista/css/bootstrap.css">
    <link rel="stylesheet" href="../../../vista/css/admind.css">
        
    <link rel="icon" href="../../img/G-icon.ico">
    
</head>
<body>
    <header>
        <nav>
            <ul >
                <li ><a href="../admin-dashboard.php" style="text-decoration: none;">Inicio  </a></li>
                <li><a href="../usuarios/index-usuario.php" style="text-decoration: none;">Usuarios</a></li>
                <li><a href="index-producto.php" style="text-decoration: none;">Productos</a></li>
                <li><a href="/admin/sales/index.php" style="text-decoration: none;">Ventas</a></li>
                <li><a href="/admin/sales_details/index.php" style="text-decoration: none;">Detalle Ventas</a></li>
            </ul>
            <a class="nav-link-right" href="../../../controlador/cerrar_sesion.php" style="text-decoration: none;" > Cerrar sesion </a>
        </nav>
    </header>
    <main>
    <style>
.button-group a {
    margin-right: 15px; /* Ajusta este valor según lo necesites */
}

.button-group a:last-child {
    margin-right: 0; /* Elimina el margen derecho del último botón */
}
</style>

<div class="d-flex justify-content-between align-items-center mb-5 mt-4">
    <h1>📦Gestión de Productos</h1>
    <div class="button-group">
      <!--  <a href="#" class="btn btn-primary">Agregar Usuario</a> boton de agregar usuario -->
        <a href="editar-producto.php" class="btn btn-primary">Editar producto</a>
        <a href="crear-producto.php" class="btn btn-primary">Crear producto</a>
        <a href="reporte-producto.php" target="_blank" class="btn btn-primary">Generar reporte</a>
    </div>
</div>


</div>
<div class="">
    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio venta</th>
                    <th>Stock</th>
                    <th>Unidad de medida</th>
                    
                    <th>Descripcion</th>
                    <th>CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['prod_codigo']; ?></td>
                        <td><?php echo $row['prod_nombre']; ?></td>
                        <td><?php echo $row['prod_precioventa']; ?></td>
                        <td><?php echo $row['prod_stock']; ?></td>
                        <td><?php echo $row['prod_unidaddemedida']; ?></td>
                       
                        <td><?php echo $row['prod_descripcion']; ?></td>
                        
                        <td>
                        <a href="editar-producto.php?prod_codigo=<?php echo $row['prod_codigo']; ?>" class="btn btn-primary btn-sm">Editar</a>

                    
                        

                        <a href="../../../controlador/productos.php?prod_codigo=<?php echo $row['prod_codigo']; ?>" 
                         class="btn btn-danger btn-sm" 
                         onclick="return confirm('¿Estás seguro de que deseas eliminar el producto <?php echo htmlspecialchars($row['prod_nombre']); ?>?');">
                                                Eliminar
                        </a>


                        </td>
                    </tr>   
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



    <footer>
        
        <p>© 2024 Panel de administrador Global gaming </p>
        

    </footer>
</body>
</html>