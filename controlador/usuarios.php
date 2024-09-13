
<?php
// conexion de base de datos 
include '../modelo/conexion_bd.php';


//eliminar un usuario 

// Incluimos la conexión a la base de datos
include '../modelo/conexion_bd.php';

// Verifica si se ha pasado un usua_codigo por GET para eliminar
if (isset($_GET['usua_codigo'])) {
    $codigo = $_GET['usua_codigo'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuario WHERE usua_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, redirigir a la página principal o mostrar un mensaje
        header("Location: ../vista/usuarios/index-usuario.php?mensaje=Usuario eliminado exitosamente");
        exit();
    } else {
        echo "Error eliminando usuario: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}



//editar un usuario 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['usua_codigo'];
    $identificacion = $_POST['usua_identificacion'];
    $tipoidentificacion = $_POST['usua_tipoidentificacion'];
    $nombre = $_POST['usua_nombre'];
    $apellido = $_POST['usua_apellido'];
    $celular = $_POST['usua_celular'];
    $direccion = $_POST['usua_direccion'];
    $usuario = $_POST['usua_usuario'];
    $password = $_POST['usua_password'];
    $rol_fk = $_POST['usua_rol_fk'];

    $password_encriptado = password_hash($password, PASSWORD_DEFAULT);

    // Consulta para actualizar los datos del usuario
    $sql = "UPDATE usuario SET 
            usua_identificacion = '$identificacion', 
            usua_tipoidentificacion = '$tipoidentificacion',
            usua_nombre = '$nombre', 
            usua_apellido = '$apellido',
            usua_celular = '$celular', 
            usua_direccion = '$direccion',
            usua_usuario = '$usuario',
            usua_password = '$password_encriptado',
            usua_rol_fk = '$rol_fk'
            WHERE usua_codigo = $codigo";

            

    if ($conn->query($sql) === TRUE) {
        // Redirige a la lista de usuarios o muestra un mensaje de éxito
        header("Location: ../vista/usuarios/index-usuario.php");
        exit();
    } else {
        echo "Error actualizando usuario: " . $conn->error;
    }

    $conn->close();
}
?>