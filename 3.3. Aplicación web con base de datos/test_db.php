<?php
try {
    // Ajusta los datos de conexión a tu configuración
    $conn = new PDO('mysql:host=localhost;dbname=gestion_personas', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
