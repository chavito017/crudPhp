<?php

   include("db.php");

   if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM controlanimales WHERE id = $id";
    $result = mysqli_query($conn ,$query);
    if (!$result){
        die("Query Faild");
    }

    $_SESSION['message'] = 'Datos eliminados correctamente';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
   }


?>