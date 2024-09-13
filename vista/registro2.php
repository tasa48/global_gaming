<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Gaming registro test de conexion</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mi_estilo-registro.css">
    <link rel="icon" href="img/G-icon.ico">
    <script type="text/javascript">
        // No se necesita código JavaScript aquí por ahora
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light barra">
        <a class="navbar-brand" href="../index.php"> <img src="img/G.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Registrarse</h5>
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
                        include('../controlador/registro.php');
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
    <img src="img/logo-principal.png" alt="Registro exitoso" class="img-fluid">
    <h3><strong>¡</strong>Tu registro se ha completado exitosamente<strong>!</strong></h3>
    <h5>Bienvenido a la familia <strong class="yellow-text">Global Gaming</strong> esperamos que la pases bien y disfrutes de nuestros servicios y realices muchas compras con nosotros estamos para servirte</h5>
    <br>
    <h6>ATT: administradores de <strong class="yellow-text">Global Gaming</strong></h6>
</div>
<div class="modal-footer">
    <a href="formulario-login.php" class="btn btn-primary">Iniciar Sesión</a>
</div>
   
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
