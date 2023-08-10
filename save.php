<?php
include("db.php");

if (isset($_POST['save'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $especie = mysqli_real_escape_string($conn, $_POST['especie']);
    $edad = mysqli_real_escape_string($conn, $_POST['edad']);
    $propietario = mysqli_real_escape_string($conn, $_POST['propietario']);

    $query = "INSERT INTO controlanimales(nombre, especie, edad, propietario) VALUES ('$nombre', '$especie', '$edad', '$propietario')"; 
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Datos Guardados correctamente';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");
}
?>
