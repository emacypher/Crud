<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $descripcion = $row['descripcion'];
        $fechainicio = $row['fechainicial'];
        $fechafin = $row['fechafinal'];
        $integrante = $row['integrante'];
        $proyecto = $row['proyecto'];
        $observacion = $row['observacion'];
        $asistencia = $row['asistencia'];
        $retraso = $row['restraso'];
    }
}


    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $descripcion = $_POST['descripcion'];
        $fechainicio = $_POST['fechainicial'];
        $fechafin = $_POST['fechafinal'];
        $integrante = $_POST['integrante'];
        $proyecto = $_POST['proyecto'];
        $observacion = $_POST['observacion'];
        $asistencia = $_POST['asistencia'];
        $retraso = $_POST['retraso'];        

        $query = "UPDATE task SET descripcion = '$descripcion', fechainicial = '$fechainicio', fechafinal = '$fechafin', integrante = '$integrante', proyecto = '$proyecto' observacion = '$observacion' , asistencia = '$asistencia', retraso = '$retraso' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Cambios realizados';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo$_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="descripcion"
                        class="form-control" placeholder="Modificar tarea" value="<?php echo $descripcion; ?>">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fechainicial" value="<?php echo $fechainicio; ?>"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fechafinal" value="<?php echo $fechafin; ?>"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="integrante" value="<?php echo $integrante; ?>"
                        class="form-control" placeholder="Actualizar el integrante">
                    </div>
                    <div class="form-group">
                        <input type="text" name="proyecto" value="<?php echo $proyecto; ?>"
                        class="form-control" placeholder="Actualizar el proyecto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="observacion" value="<?php echo $observacion; ?>"
                        class="form-control" placeholder="Añadir observaciones">
                    </div>
                    <div class="form-group">
                        <input type="text" name="asistencia" value="<?php echo $asistencia; ?>"
                        class="form-control" placeholder="Actualizar Asistencia">
                    </div>
                    <div class="form-group">
                        <input type="text" name="retraso" value="<?php echo $retraso; ?>"
                        class="form-control" placeholder="Actualizar Retraso">
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>