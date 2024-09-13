<?php
session_start();
include("../modelo/conexion_bd.php"); 

$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

// Consulta MySQL para obtener la contraseña encriptada y el rol del usuario
$consulta = "SELECT usua_password, usua_rol_fk FROM usuario WHERE usua_usuario = '$usuario'";
$resultado = mysqli_query($conn, $consulta);

// Verificar si se encontró el usuario
if (mysqli_num_rows($resultado) === 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $contrasena_encriptada = $fila['usua_password'];
    $rol = $fila['usua_rol_fk'];

    // Verificar la contraseña ingresada con la encriptada
    if (password_verify($contrasena, $contrasena_encriptada)) {
        // Iniciar sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;

        // Verificar si el usuario es administrador (rol = 1)
        if ($rol == 1) {
            header("Location: ../vista/administrador/admin-dashboard.php"); // Redirigir al panel de administrador
        } else {
            header("Location: ../vista/inicio-correcto.php"); // Redirigir al panel de usuario regular
        }
        exit();
    } else {
        // Contraseña incorrecta
        include("../vista/formulario-login.php");
        echo '<script>
                var myModal = new bootstrap.Modal(document.getElementById("loginErrorModal"), {});
                myModal.show();
              </script>';
        exit();
    }
} else {
    // Usuario no encontrado
    include("../vista/formulario-login.php");
    echo '<script>
            var myModal = new bootstrap.Modal(document.getElementById("loginErrorModal"), {});
            myModal.show();
          </script>';
    exit();
}

mysqli_free_result($resultado);
mysqli_close($conn);
?>

 