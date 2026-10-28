<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificación de Compras - KICKSTORE</title>
</head>
<body style="background-color: #0a0a0a; color: #ffffff; font-family: Arial, sans-serif; margin: 0; padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 90vh;">

  <div style="background-color: #1a1a1a; border: 1px solid #ff6b00; padding: 25px; max-width: 600px; width: 100%; border-radius: 6px; box-sizing: border-box;">
    <h2 style="color: #ff6b00; margin-top: 0; border-bottom: 1px solid #333; padding-bottom: 10px; text-align: center;">Estado de sus Compras</h2>

<?php
// Incluye las variables y la conexión $conexion desde conexion.php
include('conexion.php');

if (isset($_POST['email_busqueda']) && !empty($_POST['email_busqueda'])) {
    $email_busqueda = $conexion->real_escape_string($_POST['email_busqueda']);

    // Consulta SQL para buscar las compras registradas en la tabla 'compras' filtradas por correo
    $sql = "SELECT * FROM compras WHERE email = '$email_busqueda' ORDER BY fecha_compra DESC";
    
    // Ejecuta la consulta SQL a través de la conexión activa
    $resultado = $conexion->query($sql);

    // Comprueba si la consulta devolvió uno o más registros en la BD
    if ($resultado->num_rows > 0) {
        echo "<p style='color: #ccc;'>Compras encontradas para: <strong style='color: #ff6b00;'>" . htmlspecialchars($email_busqueda) . "</strong></p>";
        echo "<table style='width: 100%; border-collapse: collapse; margin-top: 15px; background-color: #0a0a0a; text-align: left;'>";
        echo "<tr style='background-color: #222; color: #ff6b00;'>
                <th style='padding: 10px; border: 1px solid #333;'>ID</th>
                <th style='padding: 10px; border: 1px solid #333;'>Producto</th>
                <th style='padding: 10px; border: 1px solid #333;'>Precio</th>
                <th style='padding: 10px; border: 1px solid #333;'>Estado</th>
                <th style='padding: 10px; border: 1px solid #333;'>Fecha</th>
              </tr>";

        // Recorre fila por fila los datos obtenidos de MySQL
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='padding: 10px; border: 1px solid #333;'>" . $fila['id'] . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #333;'>" . htmlspecialchars($fila['producto']) . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #333;'>$" . $fila['precio'] . " USD</td>";
            echo "<td style='padding: 10px; border: 1px solid #333; color: #00ff66;'>" . htmlspecialchars($fila['estado']) . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #333; font-size: 12px;'>" . $fila['fecha_compra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: #ff4444;'>No se encontraron compras asociadas al correo: <strong>" . htmlspecialchars($email_busqueda) . "</strong></p>";
    }
} else {
    echo "<p style='color: #ff4444;'>Por favor ingrese un correo válido.</p>";
}

// Cierra la conexión activa con la base de datos
$conexion->close();
?>

    <div style="margin-top: 25px; text-align: center;">
      <a href="index.html" style="background-color: #ff6b00; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block;">Volver a la Tienda</a>
    </div>
  </div>

</body>
</html>
