<?php
// Conexión a la base de datos 
include '../modelo/conexion_bd.php';

// Eliminar un producto
if (isset($_GET['prod_codigo'])) {
    $codigo = $_GET['prod_codigo'];

    // Eliminar la imagen del producto también (opcional)
    $sql = "SELECT prod_foto FROM producto WHERE prod_codigo = $codigo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto_path = "../img/productos/" . $row['prod_imagen'];
        if (file_exists($foto_path)) {
            unlink($foto_path); // Eliminar la imagen del servidor
        }
    }

    $sql = "DELETE FROM producto WHERE prod_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../vista/administrador/productos/index-producto.php");
        exit();
    } else {
        echo "Error eliminando producto: " . $conn->error;
    }
    $conn->close();
    exit();
}

// Crear o Editar un producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Procesar la imagen 
    $foto = '';
    if (isset($_FILES['prod_imagen']) && $_FILES['prod_imagen']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../img/productos/"; // Carpeta donde se guardarán las imágenes
        $foto = basename($_FILES['prod_imagen']['name']); // Nombre del archivo
        $target_file = $target_dir . $foto; // Ruta completa del archivo

        // Verificar si el directorio existe, si no, crear el directorio
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Mover la imagen subida al directorio correspondiente
        if (!move_uploaded_file($_FILES['prod_imagen']['tmp_name'], $target_file)) {
            echo "Error subiendo la imagen.";
            exit();
        }
    }

    if (isset($_POST['prod_codigo']) && !empty($_POST['prod_codigo'])) {
        // Editar producto existente
        $codigo = $_POST['prod_codigo'];
        $nombre = $_POST['prod_nombre'];
        $precioventa = $_POST['prod_precioventa'];
        $stock = $_POST['prod_stock'];
        $unidaddemedida = $_POST['prod_unidaddemedida'];
        $descripcion = $_POST['prod_descripcion'];

        // Si no se subió una nueva imagen, mantener la imagen anterior
        if (empty($foto)) {
            $sql = "UPDATE producto SET 
                    prod_nombre = '$nombre', 
                    prod_precioventa = '$precioventa',
                    prod_stock = '$stock', 
                    prod_unidaddemedida = '$unidaddemedida', 
                    prod_descripcion = '$descripcion'
                    WHERE prod_codigo = $codigo";
        } else {
            // Eliminar la imagen anterior antes de actualizar a la nueva imagen
            $sql_img = "SELECT prod_imagen FROM producto WHERE prod_codigo = $codigo";
            $result = $conn->query($sql_img);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $foto_path = "../img/productos/" . $row['prod_imagen'];
                if (file_exists($foto_path)) {
                    unlink($foto_path); // Eliminar la imagen anterior del servidor
                }
            }

            // Si se subió una nueva imagen, actualizarla
            $sql = "UPDATE producto SET 
                    prod_nombre = '$nombre', 
                    prod_precioventa = '$precioventa',
                    prod_stock = '$stock', 
                    prod_unidaddemedida = '$unidaddemedida',
                    prod_imagen = '$foto', 
                    prod_descripcion = '$descripcion'
                    WHERE prod_codigo = $codigo";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: ../vista/administrador/productos/index-producto.php");
            exit();
        } else {
            echo "Error actualizando producto: " . $conn->error;
        }

    } else {
        // Crear nuevo producto
        $nombre = $_POST['prod_nombre'];
        $precioventa = $_POST['prod_precioventa'];
        $stock = $_POST['prod_stock'];
        $unidaddemedida = $_POST['prod_unidaddemedida'];
        $descripcion = $_POST['prod_descripcion'];

        $sql = "INSERT INTO producto (prod_nombre, prod_precioventa, prod_stock, prod_unidaddemedida, prod_foto, prod_descripcion) 
                VALUES ('$nombre', '$precioventa', '$stock', '$unidaddemedida', '$foto', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../vista/administrador/productos/index-producto.php");
            exit();
        } else {
            echo "Error creando producto: " . $conn->error;
        }
    }

    $conn->close();
}
?>
