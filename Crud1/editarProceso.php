<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $Codigo = $_POST['codigo'];
    $Nombre = $_POST['txtNombre'];
    $Precio = $_POST['txtPrecio'];
    $Cantidad = $_POST['txtCantidad'];

    $sentencia = $bd->prepare("UPDATE productos SET Nombre = ?, Precio = ?, Cantidad = ? where Codigo = ?;");
    $resultado = $sentencia->execute([$Nombre, $Precio, $Cantidad]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>