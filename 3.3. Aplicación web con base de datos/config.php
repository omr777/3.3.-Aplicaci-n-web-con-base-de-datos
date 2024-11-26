<?php
// Configuración de conexión a la base de datos
$host = '127.0.0.1';
$db = 'gestion_personas';
$user = 'root';
$pass = 'root'; // Contraseña

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error en la conexión: ' . $e->getMessage());
}
?>
