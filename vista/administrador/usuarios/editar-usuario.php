<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../../formulario-login.php");
    exit();
}
include '../../../modelo/conexion_bd.php'; // Ajusta la ruta según sea necesario

// Consultar todos los usuarios para mostrar en el select
$sql = "SELECT usua_codigo, usua_usuario FROM usuario";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Admin Global Gaming</title>
    <link rel="stylesheet" href="../../../vista/css/bootstrap.css">
    <link rel="stylesheet" href="../../../vista/css/admind.css">
    <link rel="icon" href="../../img/G-icon.ico">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../admin-dashboard.php" style="text-decoration: none;">Inicio</a></li>
                <li><a href="index-usuario.php" style="text-decoration: none;">Usuarios</a></li>
                <a class="nav-link-right" href="../controlador/cerrar_sesion.php" style="text-decoration: none;">Cerrar sesión</a>
            </ul>
        </nav>
    </header>

    <main>

<div class="form-container mt-5">
    <h2>Seleccionar Usuario para Editar</h2>
    <form action="editar-usuario.php" method="GET">
        <div class="form-group">
            <label for="usua_codigo">Seleccione un Usuario:</label>
            <select name="usua_codigo" id="usua_codigo" class="form-control">
                <option value="">Selecciona un usuario</option>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['usua_codigo']; ?>">
                        <?php echo $row['usua_usuario']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Seleccionar</button>
    </form>

    <?php
    if (isset($_GET['usua_codigo']) && !empty($_GET['usua_codigo'])) {
        $codigo = $_GET['usua_codigo'];

        // Obtener los detalles del usuario seleccionado
        $sql = "SELECT * FROM usuario WHERE usua_codigo = $codigo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            ?>

            <h3>Editar Información del Usuario</h3>
            <form action="../../../controlador/usuarios.php" method="POST">
                <input type="hidden" name="usua_codigo" value="<?php echo $usuario['usua_codigo']; ?>">
                
                <div class="form-group">
        <label for="usua_identificacion">Identificación:</label>
                    <input type="text" class="form-control" id="usua_identificacion" name="usua_identificacion" value="<?php echo $usuario['usua_identificacion']; ?>" required>
                </div>

                <div class="form-group">
                <label for="tipo_identificacion">Tipo de Identificación</label>
<select class="form-control" id="tipo_identificacion" name="tipo_identificacion" required>
    <option value="cedula" <?php echo (isset($usuario['usua_tipoidentificacion']) && $usuario['usua_tipoidentificacion'] == 'cedula') ? 'selected' : ''; ?>>Cédula</option>
    <option value="pasaporte" <?php echo (isset($usuario['usua_tipoidentificacion']) && $usuario['usua_tipoidentificacion'] == 'pasaporte') ? 'selected' : ''; ?>>Pasaporte</option>
    <option value="tarjeta" <?php echo (isset($usuario['usua_tipoidentificacion']) && $usuario['usua_tipoidentificacion'] == 'tarjeta') ? 'selected' : ''; ?>>Tarjeta de identidad</option>
    <option value="otro" <?php echo (isset($usuario['usua_tipoidentificacion']) && $usuario['usua_tipoidentificacion'] == 'otro') ? 'selected' : ''; ?>>Otro</option>
</select>

                </div>

                <div class="form-group">
                    <label for="usua_nombre">Nombre:</label>
                    <input type="text" class="form-control" id="usua_nombre" name="usua_nombre" value="<?php echo $usuario['usua_nombre']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_apellido">Apellido:</label>
                    <input type="text" class="form-control" id="usua_apellido" name="usua_apellido" value="<?php echo $usuario['usua_apellido']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_celular">Celular:</label>
                    <input type="text" class="form-control" id="usua_celular" name="usua_celular" value="<?php echo $usuario['usua_celular']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_direccion">Dirección:</label>
                    <input type="text" class="form-control" id="usua_direccion" name="usua_direccion" value="<?php echo $usuario['usua_direccion']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usua_usuario" name="usua_usuario" value="<?php echo $usuario['usua_usuario']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_password">Contraseña:</label>
                    <input type="text" class="form-control" id="usua_password" name="usua_password" value="<?php echo $usuario['usua_password']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usua_rol_fk">Rol:</label>
                    <input type="text" class="form-control" id="usua_rol_fk" name="usua_rol_fk" value="<?php echo $usuario['usua_rol_fk']; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>

            <?php
        } else {
            echo '<div class="alert alert-danger" role="alert">No se encontró el usuario seleccionado.</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">Por favor, selecciona un usuario.</div>';
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