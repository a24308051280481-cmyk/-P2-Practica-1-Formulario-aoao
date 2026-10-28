<?php
// Nombre del servidor local
$host = "localhost";

// Usuario por defecto de XAMPP
$usuario = "root";

// Contraseña (vacía en XAMPP)
$password = "";

// Nombre de la base de datos
$bd = "kickstore_db";

// Crear la conexión a MySQL
$conexion = new mysqli($host, $usuario, $password, $bd);

// Verificar si hubo error al conectar
if ($conexion->connect_error) {
    // Detener script y mostrar error
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>
