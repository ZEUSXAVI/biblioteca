<?php
function conexion() {
    $servername = "localhost";  // Cambia esto si tu servidor no es local
    $username = "root";      // Cambia esto por tu usuario de MySQL
    $password = "";   // Cambia esto por tu contraseña de MySQL
    $dbname = "biblioteca"; // Cambia esto por el nombre de tu base de datos
    
    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;  // Retornar la conexión para ser usada más tarde
}