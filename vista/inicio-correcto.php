
<?php
session_start();

// Verificar si el usuario está autenticado y no es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] == 1) {
    $_SESSION['error_mensaje'] = "No puedes acceder a esta página. Solo los usuarios registrados tienen acceso.";
    header("Location: ../vista/formulario-login.php");
    exit();
}

// Aquí va el contenido para usuarios regulares...
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Global Gaming</title>
  <link rel="stylesheet" type="text/css" href="../vista/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../vista/css/mi_estilo.css">
</head>
<body>

    <!--barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-light barra">
    <a class="navbar-brand" href="../vista/inicio-correcto.php"> <img src="../vista/img/G.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../vista/inicio-correcto.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="descuentos.html">Descuentos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Productos
          </a>
          <div class="dropdown-menu barra2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="vista/destacados.html">Destacados</a>
            <a class="dropdown-item" href="#">Nuevos Productos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Productos</a>
          </div>
        </li>
      
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
    <div> 
      
    <a class="nav-link" href="../controlador/cerrar_sesion.php"> Cerrar sesion <span class="sr-only">(current)</span></a>
    </div>
  </nav>
  <h1>Bienvenido, estamos trabajando vuelvel pronto sorry </h1>
  <!--carrucel de fotos -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 alto" src="../vista/img/1.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 alto" src="../vista/img/2.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 alto" src="../vista/img/3.png" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--barra de calidad-->
  <div class="row beneficios">
    <div class="col-md-4">
      CALIDAD
      <p><img src="../vista/img/calidad.png"></p>
    </div>
    <div class="col-md-4">
      BAJOS COSTOS
      <p><img src="../vista/img/precio-bajo.png"></p>
    </div>
    <div class="col-md-4">
      Soporte de venta
      <p><img src="../vista/img/servicio-al-cliente.png"></p>
    </div>
  </div>
  <!--cards de compra-->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../vista/img/card1.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Teclado Red Dragon mecanico</h5>
            <p class="card-text">Teclado de alta calidad para juegos, econfiguracion de 60% perfecto para jugar.</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../vista/img/card2.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">G502</h5>
            <p class="card-text">El mouse mas usado para los video juegos, cuenta con baja latencia y una calidad muy buena</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../vista/img/card3.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Mouse custom LOL</h5>
            <p class="card-text">Mouse version LoL para los raritos no se que mause es :)</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Button trigger modal -->
<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Iniciar sesion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="">
              <div>
                <div style="height: 20px;"></div>
                <img src="vista/img/logo-principal.png" alt="Imagen" class="img-fluid mx-auto d-block">
              </div>
               <!-- ventana modal login-->
              <label>Usuario</label>
              <input class="input-login" type="text" name="usuario" required>
              <label>Contraseña</label>
              <input class="input-login" type="password" name="Contraseña" required>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Iniciar</button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
  <!--pie de pagina-->
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h2>Teléfono</h2>
        <p>Teléfono: +123 456 789</p>
      </div>
      <div class="footer-section">
        <img src="../vista/img/G.png">
      </div>
      <div class="footer-section">
        <h2>Contáctanos</h2>
        <div class="../social-icons">
          <img src="../vista/img/WhatsApp.png">
          <img src="../vista/img/Facebook.png">
          <img src="../vista/img/Instagram.png">
          <hr>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; Global Gaming 2023. Todos los derechos reservados.</p>
    </div>
  </footer>
  <!--links-->
  <script src="../vista/js/jquery.js"></script>
  <script src="../vista/js/popper.min.js"></script>
  <script src="../vista/js/bootstrap.min.js"></script>
</body>
</html>