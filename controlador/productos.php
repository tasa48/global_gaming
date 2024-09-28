<?php
// Conexión a la base de datos 
include '../modelo/conexion_bd.php';

// Eliminar un producto
if (isset($_GET['prod_codigo'])) {
    $codigo = $_GET['prod_codigo'];

 
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

// Crear o Editar un producto (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    if (isset($_POST['prod_codigo']) && !empty($_POST['prod_codigo'])) {
       
        $codigo = $_POST['prod_codigo'];
        $nombre = $_POST['prod_nombre'];
        $precioventa = $_POST['prod_precioventa'];
        $stock = $_POST['prod_stock'];
        $unidaddemedida = $_POST['prod_unidaddemedida'];
        $descripcion = $_POST['prod_descripcion'];
        $foto = ''; // La foto se deja en blanco por ahora

        // Consulta para actualizar el producto
        $sql = "UPDATE producto SET 
                prod_nombre = '$nombre', 
                prod_precioventa = '$precioventa',
                prod_stock = '$stock', 
                prod_unidaddemedida = '$unidaddemedida',
                prod_foto = '$foto', 
                prod_descripcion = '$descripcion'
                WHERE prod_codigo = $codigo";

        if ($conn->query($sql) === TRUE) {
          o
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
        $foto = ''; // Dejar la foto en blanco por ahora

      
        $sql = "INSERT INTO producto (prod_nombre, prod_precioventa, prod_stock, prod_unidaddemedida, prod_foto, prod_descripcion) 
                VALUES ('$nombre', '$precioventa', '$stock', '$unidaddemedida', '$foto', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
           
            header("Location:../vista/administrador/productos/index-producto.php");
            exit();
        } else {
            echo "Error creando producto: " . $conn->error;
        }
    }


    $conn->close();
}
?>
