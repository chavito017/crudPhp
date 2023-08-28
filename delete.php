<?php
   include("db.php"); // Incluye el archivo de conexión a la base de datos.

   if (isset($_GET['id'])){ // Verifica si se proporcionó un ID en la URL.
       $id = $_GET['id']; // Obtiene el ID del registro a eliminar desde la URL.
       $query = "DELETE FROM controlanimales WHERE id = $id"; // Consulta para eliminar el registro con el ID proporcionado.
       $result = mysqli_query($conn ,$query); // Ejecuta la consulta en la base de datos.
       
       if (!$result){
           die("Query Failed"); // Si la consulta falla, muestra un mensaje de error.
       }

       $_SESSION['message'] = 'Datos eliminados correctamente'; // Almacena un mensaje de éxito en la sesión.
       $_SESSION['message_type'] = 'danger'; // Almacena el tipo de mensaje en la sesión.
       header("Location: index.php"); // Redirige a la página principal.
   }
?>