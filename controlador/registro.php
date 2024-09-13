<?php
include __DIR__ . '/../modelo/conexion_bd.php';

$registro_exitoso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar datos del formulario
    $identificacion = $conn->real_escape_string($_POST['identificacion']);
    $tipo_identificacion = $conn->real_escape_string($_POST['tipo_identificacion']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $contrasena = $conn->real_escape_string($_POST['contrasena']);
    $celular = $conn->real_escape_string($_POST['celular']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    
    // Encriptado de contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Validación de datos
    $errores = [];

    // Validación de identificacion (solo 12 números)
    if (!preg_match('/^[0-9]{10}$/', $identificacion)) {
        $errores[] = "La identificación debe tener exactamente 10 dígitos.";
    }

    // Validación de usuario (solo 10 caracteres, sin espacios)
    if (strlen($usuario) > 10 || preg_match('/\s/', $usuario)) {
        $errores[] = "El nombre de usuario debe tener un máximo de 8 caracteres y no debe contener espacios.";
    }

    // Validación de contraseña (mínimo 8 caracteres)
    if (strlen($contrasena) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    // Validación de celular (mínimo 10 números)
    if (!preg_match('/^[0-9]{10,}$/', $celular)) {
        $errores[] = "El número de celular debe tener al menos 10 dígitos.";
    }

    // Validación de dirección (debe incluir al menos un guion medio)
    if (!strpos($direccion, '-')) {
        $errores[] = "La dirección debe contener al menos un guion medio (-).";
    }

    // Verificar si el usuario ya existe en la base de datos
    $consulta_usuario = "SELECT * FROM usuario WHERE usua_usuario = '$usuario'";
    $resultado = $conn->query($consulta_usuario);

    if ($resultado->num_rows > 0) {
        $errores[] = "El nombre de usuario ya está registrado. Por favor, elige otro.";
    }

    // Si hay errores, mostrar mensajes y no insertar en la base de datos
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    } else {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO `usuario`(`usua_codigo`, `usua_identificacion`, `usua_tipoidentificacion`, `usua_nombre`, `usua_apellido`, `usua_celular`, `usua_direccion`, `usua_usuario`, `usua_password`, `usua_rol_fk`)
                VALUES ('', '$identificacion', '$tipo_identificacion', '$nombre', '$apellido', '$celular', '$direccion', '$usuario', '$contrasena_encriptada', '2')";

        if ($conn->query($sql) === TRUE) {
            $registro_exitoso = true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Cerrar conexión
    $conn->close();
}
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var registroExitoso = <?php echo json_encode($registro_exitoso); ?>;
        if (registroExitoso) {
            $('#registroExitosoModal').modal('show');
        }
    });
</script>

