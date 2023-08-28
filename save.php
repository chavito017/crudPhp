<?php
include("db.php");  // Incluye el archivo de conexión a la base de datos.

if (isset($_POST['save'])) { // Comprueba si el botón "Save Task" ha sido presionado en el formulario.
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);           // Sanitiza y almacena el nombre ingresado.
    $especie = mysqli_real_escape_string($conn, $_POST['especie']);         // Sanitiza y almacena la especie ingresada.
    $edad = mysqli_real_escape_string($conn, $_POST['edad']);               // Sanitiza y almacena la edad ingresada.  
    $propietario = mysqli_real_escape_string($conn, $_POST['propietario']); // Sanitiza y almacena el propietario ingresado.
    
    // Consulta SQL para insertar los datos en la tabla "controlanimales".
    $query = "INSERT INTO controlanimales(nombre, especie, edad, propietario) VALUES ('$nombre', '$especie', '$edad', '$propietario')"; 
    $result = mysqli_query($conn, $query); // Ejecuta la consulta en la base de datos.

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));  // Si la consulta falla, muestra un mensaje de error.
    }

    $_SESSION['message'] = 'Datos Guardados correctamente'; // Almacena un mensaje de éxito en la sesión.
    $_SESSION['message_type'] = 'success'; // Almacena el tipo de mensaje en la sesión.

    header("location: index.php");  // Redirige de nuevo a la página principal.
}
?>
<!-- "Sanitizar" es un término que se utiliza en el contexto de la seguridad informática para referirse al proceso de limpiar y validar los datos de entrada antes de utilizarlos en aplicaciones o sistemas. La sanitización es un método para prevenir ataques maliciosos, como la inyección de código o el abuso de datos maliciosos. -->