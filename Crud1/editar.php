<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $Codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from productos where codigo = ?;");
    $sentencia->execute([$Codigo]);
    $productos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($productos);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                   
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $productos->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $productos->Precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="txtCantidad" autofocus required
                        value="<?php echo $productos->Cantidad; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $productos->Codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>