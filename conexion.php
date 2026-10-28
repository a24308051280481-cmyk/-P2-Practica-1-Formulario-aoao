<?php
// Configuración por defecto de XAMPP
$host = "localhost";
$usuario = "root";   // En XAMPP el usuario por defecto es "root"
$password = "";      // En XAMPP la contraseña por defecto está vacía
$bd = "kickstore_db";

// Crear conexión con MySQL
$conexion = new mysqli($host, $usuario, $password, $bd);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>