<?php

include("db.php");

if (isset($_POST['save_task'])){
    $fechainicial = $_POST['fechainicial'];
    $descripcion = $_POST['descripcion'];
    $fechafinal = $_POST['fechafinal'];
    $integrante = $_POST['integrante'];
    $proyecto = $_POST['proyecto'];
    $observacion = $_POST['observacion'];
    $asistencia = $_POST['integrante'];
    $retraso = $_POST['retraso'];
    $query = "INSERT INTO task(fechainicial,descripcion,fechafinal,integrante,proyecto,observacion,asistencia,retraso) VALUES ('$fechainicial','$descripcion','$fechafinal','$integrante','$proyecto','$observacion','$asistencia','$retraso')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Tarea guardada';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}

?>