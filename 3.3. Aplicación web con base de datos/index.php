<?php
include('config.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
    <h1>Gestión de Personas</h1>
    <div id="dialog"></div>
    <div class="filters">
        <input type="text" id="search" placeholder="Buscar por apellido">
        <button id="search-btn">Buscar</button>
        <select id="order">
            <option value="ASC">Ascendente</option>
            <option value="DESC">Descendente</option>
        </select>
        <button id="add-btn">Agregar Persona</button>
    </div>

    <table id="personas-table">
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div class="pagination">
        <button id="prev">Anterior</button>
        <span id="page-info"></span>
        <button id="next">Siguiente</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
