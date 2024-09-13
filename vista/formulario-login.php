<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start(); // Inicia la sesión solo si no está activa
}

if (isset($_SESSION['error_mensaje'])) {
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['error_mensaje'];
    echo '</div>';
    unset($_SESSION['error_mensaje']); // Eliminar el mensaje después de mostrarlo
}

if (isset($_SESSION['error_mensaje'])) {
  echo '<div class="alert alert-danger" role="alert">';
  echo $_SESSION['error_mensaje'];
  echo '</div>';
  unset($_SESSION['error_mensaje']); // Eliminar el mensaje después de mostrarlo
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Global gaming</title>
    <link rel="stylesheet" type="text/css" href="../vista/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../vista/css/login.css">
    <link rel="icon" href="img/G-icon.ico">
</head>
<body>
<div class="nav_fake">
    <a href="../index.php">
    <button class="back-bt btn-lg form-label"> Regresar </button>
</a>
</div>

    <section class="vh-100" style="background-color: #000814;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;  background-color: black;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="../vista/img/login-final2.png"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="../controlador/login.php" method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Bienvenido </span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesion</h5>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="text"name="usuario" id="form2Example17" class="form-control form-control-lg" placeholder="Escribe tu usuario" />
                          <label class="form-label" for="form2Example17">Usuario</label>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="password"name="password" id="form2Example27" class="form-control form-control-lg" placeholder="Escribe tu Contraseña"/>
                          <label class="form-label" for="form2Example27">Contraseña</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
                       
      
                        <p class="mb-5 pb-lg-2" style="color: #fff;"><a href="../vista/registro2.php"
                            style="color: #ffc300;">¡Registrate aqui!</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content custom-modal-content" style="background-color: #01142e; color: #ffffff;">
            <div class="modal-header">
                <h5 class="modal-title" id="loginErrorModalLabel" >Error en contraseña o usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="../vista/img/cerrar.png" alt="mal error" class="img-fluid">
                <h3><strong>¡</strong><span style="color: #FFC300;">Verifica tu información</span><strong>!</strong></h3>
                <h5>Tienes un error al insertar tus datos. Por favor, verifica la información insertada.</h5>
                <br>
                <h6><span style="color: #FFC300;">Global Gaming :(</span></h6>
            </div>
            <div class="modal-footer md-footer">
            <button type="button" class="btn btn-warning" style="background-color: #FFC300; color: #000000;" data-dismiss="modal">Cerrar</button>
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
        <div class="social-icons">
          <img src="../vista/img/WhatsApp.png">
          <img src="../vista/img/Facebook.png">
          <img src="../vista/img/Instagram.png">
          <hr>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <h6> Política de privacidad | Términos y Condiciones | Aviso de Privacidad | SIC</h6>
      <p>&copy; Global Gaming 2023. Todos los derechos reservados.</p>
    </div>
  </footer>
        <!--links-->
  <script src="../vista/js/jquery.js"></script>
  <script src="../vista/js/popper.min.js"></script>
  <script src="../vista/js/bootstrap.min.js"></script>
</body>
</html>