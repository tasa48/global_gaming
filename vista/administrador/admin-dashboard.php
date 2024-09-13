<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../formulario-login.php");
    exit();
}

// Aquí va el contenido para administradores...
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Global gaming</title>
    <link rel="stylesheet" href="../../vista/css/bootstrap.css">
    <link rel="stylesheet" href="../../vista/css/admind.css">
        
    <link rel="icon" href="../../vista/img/G-icon.ico">
    
</head>
<body>
    <header>
        <nav>
            <ul >
                <li ><a href="admin-dashboard.php" style="text-decoration: none;">Inicio </a></li>
                <li><a href="usuarios/index-usuario.php" style="text-decoration: none;">Usuarios</a></li>
                <li><a href="productos/index-producto.php" style="text-decoration: none;">Productos</a></li>
                <li><a href="/admin/sales/index.php" style="text-decoration: none;">Ventas</a></li>
                <li><a href="/admin/sales_details/index.php" style="text-decoration: none;">Detalle Ventas</a></li>
            </ul>
            <a class="nav-link-right" href="../../controlador/cerrar_sesion.php" style="text-decoration: none;" > Cerrar sesion </a>
        </nav>
    </header>
 <main>
 <section class="welcome-panel">
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    <p>Aquí puedes gestionar todos los aspectos de Global Gaming. Usa el menú de arriba para navegar.</p>
</section>
</main>
    <footer>
        
        <p>© 2024 Panel de administrador Global gaming </p>
        

    </footer>
</body>
</html>