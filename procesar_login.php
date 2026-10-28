<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Procesar Registro - KICKSTORE</title>
</head>
<body style="background-color: #0a0a0a; color: #ffffff; font-family: Arial, sans-serif; margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 90vh;">

  <div style="background-color: #1a1a1a; border: 1px solid #ff6b00; padding: 25px; max-width: 450px; width: 100%; border-radius: 6px; box-sizing: border-box; text-align: center;">

<?php
// Incluye las variables y la conexión $conexion desde conexion.php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email       = $conexion->real_escape_string($_POST['email']);
    $password    = $conexion->real_escape_string($_POST['password']);
    $tipo_cuenta = $conexion->real_escape_string($_POST['tipo_cuenta']);
    $pin         = isset($_POST['pin']) ? $conexion->real_escape_string($_POST['pin']) : '';

    // Consulta SQL para insertar el nuevo usuario en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (email, password, tipo_cuenta, pin) 
            VALUES ('$email', '$password', '$tipo_cuenta', '$pin')";

    // Ejecuta la consulta en MySQL a través de la conexión activa
    if ($conexion->query($sql) === TRUE) {
        echo "<h2 style='color: #00ff66; margin-top: 0;'>¡Usuario Guardado en SQL!</h2>";
        echo "<p style='color: #ccc;'>Bienvenido: <strong style='color: #ff6b00;'>" . htmlspecialchars($email) . "</strong></p>";
        echo "<p style='color: #ccc;'>Tipo de cuenta: <strong>" . htmlspecialchars($tipo_cuenta) . "</strong></p>";
    } else {
        // Muestra el mensaje de error si falla la inserción en la BD
        echo "<h2 style='color: #ff4444;'>Error al registrar el usuario</h2>";
        echo "<p>" . $conexion->error . "</p>";
    }
}

// Cierra la conexión activa con la base de datos
$conexion->close();
?>

    <div style="margin-top: 25px;">
      <a href="index.html" style="background-color: #ff6b00; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block;">Ir a la Tienda Principal</a>
    </div>

  </div>

</body>
</html>
