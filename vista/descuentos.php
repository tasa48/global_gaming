    <?php
    // Incluir el archivo de conexión a la base de datos
    include '../modelo/conexion_bd.php';

    // Consulta para obtener los productos de la base de datos, incluyendo la imagen
    $sql = "SELECT prod_codigo, prod_nombre, prod_precioventa, prod_descripcion, prod_imagen FROM producto";
    $result = $conn->query($sql);
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Gaming - Productos con Descuento</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/descuentos.css">
        <link rel="icon" href="img/G-icon.ico">
        <script src="js/descuentos.js"></script>
    </head>
    <body>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light barra">
            <a class="navbar-brand" href="../index.php"><img src="img/G.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="descuentos.php">Descuentos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Productos
                        </a>
                        <div class="dropdown-menu barra2" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="destacados.html">Destacados</a>
                            <a class="dropdown-item" href="#">Nuevos Productos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Productos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario-login.php">Login</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>

        <!-- Contenido principal -->
        <div class="container mt-5">
            <h1>Productos con descuentos</h1>

            <div class="row mt-5">
                <?php
                // Verificar si hay productos en la base de datos
                if ($result->num_rows > 0) {
                    // Recorrer los resultados y generar las cards dinámicamente
                    while($row = $result->fetch_assoc()) {
                        // Asignar la ruta de la imagen según el campo prod_foto, o mostrar una imagen por defecto si no existe
                        $imagen_producto = !empty($row['prod_imagen']) ? 'img/prod-fotos/' . $row['prod_imagen'] : 'img/default.png';
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Mostrar la imagen del producto -->
                                <img src="<?php echo $imagen_producto; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['prod_nombre']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['prod_nombre']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($row['prod_descripcion']); ?></p>
                                    <p class="card-text"><strong>$<?php echo number_format($row['prod_precioventa'], 2); ?></strong></p>
                                    <a href="#" class="btn btn-primary">Añadir al carrito</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No hay productos disponibles.</p>";
                }
                ?>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h2>Teléfono</h2>
                    <p>Teléfono: +123 456 789</p>
                </div>
                <div class="footer-section">
                    <img src="img/G.png" alt="Logo">
                </div>
                <div class="footer-section">
                    <h2>Contáctanos</h2>
                    <div class="social-icons">
                        <img src="img/WhatsApp.png" alt="WhatsApp">
                        <img src="img/Facebook.png" alt="Facebook">
                        <img src="img/Instagram.png" alt="Instagram">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <h6>Política de privacidad | Términos y Condiciones | Aviso de Privacidad | SIC</h6>
                <p>&copy; Global Gaming 2024. Todos los derechos reservados.</p>
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
    </body>
    </html>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>
