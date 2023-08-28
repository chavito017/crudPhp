<?php
include("db.php");  // Incluye el archivo de conexión a la base de datos.

if (isset($_GET['id'])) { // Comprueba si se proporcionó un ID en la URL.
    $id = $_GET['id'];    // Almacena el ID proporcionado en la variable $id.
    $query = "SELECT * FROM controlanimales WHERE id = $id"; // Consulta para seleccionar el registro con el ID proporcionado.
    $result = mysqli_query($conn, $query); // Ejecuta la consulta en la base de datos.

    // Comprueba si se encontró exactamente un registro con el ID proporcionado.
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result); // Obtiene los datos del registro encontrado.
        $nombre = $row['nombre'];           // Almacena el nombre del animal.
        $especie = $row['especie'];         // Almacena la especie del animal.
        $edad = $row['edad'];               // Almacena la edad del animal.
        $propietario = $row['propietario']; // Almacena el propietario del animal.
    } else {
        echo "No se encontró ningún registro con el ID proporcionado.";
    }
}

if (isset($_POST['update'])) { // Verifica si se envió el formulario con el botón "update".
    // echo 'updating';
    $id = $_GET['id'];                    // Obtiene el ID del registro a actualizar desde la URL.
    $nombre = $_POST['nombre'];           // Obtiene el nuevo valor del nombre desde el formulario.
    $especie = $_POST['especie'];         // Obtiene el nuevo valor de la especie desde el formulario.
    $edad = $_POST['edad'];               // Obtiene el nuevo valor de la edad desde el formulario.
    $propietario = $_POST['propietario']; // Obtiene el nuevo valor del propietario desde el formulario.
    
    // Consulta SQL para actualizar los datos del registro en la tabla "controlanimales".
    $query = "UPDATE controlanimales SET nombre = '$nombre', especie = '$especie', edad = '$edad', propietario = '$propietario' WHERE id = $id";
    $result = mysqli_query($conn, $query); // Ejecuta la consulta en la base de datos.

    $_SESSION['message'] = 'Datos Actualizados correctamente'; // Almacena un mensaje de éxito en la sesión.
    $_SESSION['message_type'] = 'info'; // Almacena el tipo de mensaje en la sesión.

    if ($result) {
        header("Location: index.php"); // Redirige a la página principal después de la actualización.
        exit(); // Finaliza la ejecución del script actual.
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn); // Muestra un mensaje de error si la actualización falla.
    }
}

?>
<?php include("includes/header.php") ?> <!-- Incluye el encabezado de la página. -->

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

<?php include("includes/footer.php") ?> <!-- Incluye el pie de página. -->
