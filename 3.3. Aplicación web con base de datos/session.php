<?php
session_start();

// Verificar token de sesión
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

function verifySession() {
    if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
        die(json_encode(['success' => false, 'message' => 'Sesión no válida']));
    }
}
?>
