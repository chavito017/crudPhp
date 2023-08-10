<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="save.php" method="POST">
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
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Save Task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th> <!-- Cambia "Title" a "Nombre" -->
                        <th>Especie</th> <!-- Cambia "Description" a "Especie" -->
                        <th>Edad</th>
                        <th>Propietario</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM controlanimales";
                    $result_control = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_control)) { ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td> <!-- Cambia 'title' a 'nombre' -->
                            <td><?php echo $row['especie'] ?></td> <!-- Cambia 'description' a 'especie' -->
                            <td><?php echo $row['edad'] ?></td>
                            <td><?php echo $row['propietario'] ?></td>
                            <td>
                                <a href="edit.php?id= <?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id= <?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>