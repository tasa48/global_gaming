<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Gaming - compra :)</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/prod-vista.css">
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


<!-- Contenido general de la pagina web -->
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <img src="img/1.png" alt="Nombre del Producto" class="img-fluid" id="product-image">
        </div>
        <div class="col-md-6">
            <h2 class="product-title">Nombre del Producto</h2>
            <p class="product-description">Descripción detallada del producto. Aquí puedes incluir información sobre características, beneficios y cualquier otra cosa relevante que el cliente debería saber.</p>
            <p class="product-available">Número de productos disponibles: <strong>10</strong></p>
            <p class="product-price"><strong>$99.99</strong></p>
            <button class="btn btn-primary" id="buy-button">Añadir al carrito</button>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- pie de pagina -->
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