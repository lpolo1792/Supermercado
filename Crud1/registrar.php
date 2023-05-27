<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtCantidad"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];
    
    $sentencia = $bd->prepare("INSERT INTO productos(nombre,precio,cantidad) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$precio,$cantidad]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>