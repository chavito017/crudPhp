<?php include("db.php"); ?>  <!-- Incluye el archivo "db.php" que probablemente contiene la configuración de la base de datos y la conexión. -->
<?php include("includes/header.php"); ?>  <!-- Incluye el encabezado de la página, que podría contener elementos como la barra de navegación. -->

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>  <!-- Comprueba si hay un mensaje almacenado en la sesión. -->
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?> <!-- Muestra el contenido del mensaje almacenado en la sesión. -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>  <!-- Limpia los datos almacenados en la sesión relacionados con el mensaje. -->

            <div class="card card-body">
                <form action="save.php" method="POST">  <!-- Formulario para enviar datos al archivo "save.php" usando el método POST. -->
                 <!-- Campos para ingresar información sobre un animal. -->
                    <div class="form-group">  
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del animal" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="especie" class="form-control" placeholder="Tipo de especie" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="number" name="edad" class="form-control" placeholder="Edad" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="propietario" rows="2" class="form-control" placeholder="Propietario"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Save Task">   <!-- Botón para enviar el formulario y guardar la tarea. -->
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">  <!-- Crea una tabla con bordes utilizando la clase "table-bordered". -->
                <thead>
                    <tr>
                        <th>Nombre</th>      <!-- Encabezado de columna para mostrar el nombre del animal. -->
                        <th>Especie</th>     <!-- Encabezado de columna para mostrar la especie del animal. -->
                        <th>Edad</th>        <!-- Encabezado de columna para mostrar la edad del animal. -->
                        <th>Propietario</th> <!-- Encabezado de columna para mostrar el propietario del animal. -->
                        <th>Actions</th>     <!-- Encabezado de columna para mostrar acciones como editar y eliminar. -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM controlanimales"; // Consulta para seleccionar todos los registros de la tabla "controlanimales".
                    $result_control = mysqli_query($conn, $query); // Ejecuta la consulta en la base de datos.
                    
                    // Itera a través de los resultados de la consulta y muestra cada fila en la tabla.
                    while ($row = mysqli_fetch_array($result_control)) { ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>      <!-- Muestra el valor de la columna 'nombre' para esta fila. -->
                            <td><?php echo $row['especie'] ?></td>     <!-- Muestra el valor de la columna 'especie' para esta fila. -->
                            <td><?php echo $row['edad'] ?></td>        <!-- Muestra el valor de la columna 'edad' para esta fila. -->
                            <td><?php echo $row['propietario'] ?></td> <!-- Muestra el valor de la columna 'propietario' para esta fila. -->
                            <td>
                                <a href="edit.php?id= <?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i> <!-- Botón de edición con icono de lápiz. -->
                                </a>
                                <a href="delete.php?id= <?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i> <!-- Botón de eliminación con icono de papelera. -->
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?> <!-- Incluye el pie de página. -->