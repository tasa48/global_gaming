<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los administradores tienen acceso.";
    header("Location: ../..
    /formulario-login.php");
    exit();
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
            <ul>
                <li><a href="../admin-dashboard.php" style="text-decoration: none;">Inicio</a></li>
                <li><a href="index-usuario.php" style="text-decoration: none;">Usuarios</a></li>
                <a class="nav-link-right" href="../controlador/cerrar_sesion.php" style="text-decoration: none;">Cerrar sesión</a>
            </ul>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Crear usuario</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="identificacion">Identificación</label>
                                <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo_identificacion">Tipo de Identificación</label>
                                <select class="form-control" id="tipo_identificacion" name="tipo_identificacion" required>
                                    <option value="cedula">Cédula</option>
                                    <option value="pasaporte">Pasaporte</option>
                                    <option value="otro">Targeta de identidad</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                               
                            </div>
                        </form>
                        <?php
                        // Aquí puedes incluir tu archivo PHP que maneja el registro
                        include('../../../controlador/registro.php');
                        ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Ventana Modal de Registro Exitoso -->
    <div class="modal fade" id="registroExitosoModal" tabindex="-1" role="dialog" aria-labelledby="registroExitosoLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content custom-modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroExitosoLabel">Registro Exitoso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
    
    <h3><strong>¡</strong>registro exitoso<strong>!</strong></h3>
   
</div>
<div class="modal-footer">
    <a href="../" class="btn btn-primary">cerrar</a>
</div>
   
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>

    <footer>
        
        <p>© 2024 Panel de administrador Global gaming </p>
        

    </footer>

</body>


</html>