<?php 
    session_start(); //Iniciar una nueva sesión o reanudar la existente
    session_destroy(); //Destruye la sesión
    include "connection/connection.php";
    
  
    header('location: ../index.php'); //Redirecciona al inicio
    $conn->close(); // cerramos conexion a la base de datos
?>
