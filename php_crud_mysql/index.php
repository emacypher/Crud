<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <label for="descripcion">Tarea a realizar:</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Tarea a realizar" autofocus>
                        </input>
                        <label for="fechainicial">Fecha de comienzo:</label>
                        <input type="date" name="fechainicial" class="form-control"></input>
                        <label for="fechafinal">Fecha fin:</label>
                        <input type="date" name="fechafinal" class="form-control"></input>                        
                        <label for="integrante">Integrante:</label>
                        <input type="text" name="integrante" class="form-control" placeholder="Integrante" >
                        </input>
                        <label for="proyecto">Proyecto:</label>
                        <input type="text" name="proyecto" class="form-control" placeholder="Proyecto" >
                        </input>
                        <label for="observacion">Observaciones:</label>
                        <input type="text" name="observacion" class="form-control" placeholder="Observaciones" >
                        </input>
                        <label for="asistencia">Asistencia:</label>
                        <input type="text" name="asistencia" class="form-control" placeholder="Asistencia" >
                        </input>
                        <label for="retraso">Retraso:</label>
                        <input type="text" name="retraso" class="form-control" placeholder="retraso" >
                        </input>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar Tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="tablita table table-bordered">
                <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Integrante</th>
                        <th>Proyecto</th>
                        <th>Observacion</th>
                        <th>Asistencia</th>
                        <th>Retraso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['descripcion']?>
                            </td>
                            <td>
                                <?php echo $row['fechainicial']?>
                            </td>
                            <td>
                                <?php echo $row['fechafinal']?>
                            </td>
                            <td>
                                <?php echo $row['integrante']?>
                            </td>
                            <td>
                                <?php echo $row['proyecto']?>
                            </td>
                            <td>
                                <?php echo $row['observacion']?>
                            </td>
                            <td>
                                <?php echo $row['asistencia']?>
                            </td>
                            <td>
                                <?php echo $row['retraso']?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>