<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM controlanimales WHERE id = $id"; // Agregar $id
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $especie = $row['especie']; 
        $edad = $row['edad']; 
        $propietario = $row['propietario']; 
    } else {
        echo "No se encontró ningún registro con el ID proporcionado.";
    }
}

if (isset($_POST['update'])){
    // echo 'updating';
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $especie = $_POST['especie']; 
    $edad = $_POST['edad']; 
    $propietario = $_POST['propietario'];

    $query = "UPDATE controlanimales SET nombre = '$nombre', especie = '$especie', edad = '$edad', propietario = '$propietario' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $_SESSION['message'] = 'Datos Actualizados correctamente ';
    $_SESSION['message_type'] = 'info';

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}

?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="especie" value="<?php echo $especie; ?>" class="form-control" placeholder="Actualizar especie">
                    </div>
                    <div class="form-group">
                        <input type="number" name="edad" value="<?php echo $edad; ?>" class="form-control" placeholder="Actualizar edad">
                    </div>
                    <div class="form-group">
                        <textarea name="propietario" rows="2" class="form-control" placeholder="Actualizar propietario"><?php echo $propietario ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>