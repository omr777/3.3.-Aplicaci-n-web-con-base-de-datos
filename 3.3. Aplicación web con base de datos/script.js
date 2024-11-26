$(document).ready(function () {
    let currentPage = 1;
    const limit = 10;

    // Cargar datos iniciales
    loadData();

    // Función para cargar datos
    function loadData(search = '', order = 'ASC') {
        $.ajax({
            url: 'get_personas.php',
            method: 'POST',
            data: { page: currentPage, limit, search, order },
            success: function (response) {
                const data = JSON.parse(response);
                renderTable(data.records);
                updatePagination(data.totalPages);
            },
            error: function () {
                showDialog("Error al cargar los datos.", "error");
            }
        });
    }

    // Renderizar la tabla
    function renderTable(records) {
        const tbody = $('#personas-table tbody');
        tbody.empty();
        records.forEach(person => {
            const row = `<tr id="row-${person.id}">
                <td>${person.apellido}</td>
                <td>${person.correo}</td>
                <td>${person.telefono}</td>
                <td>${person.direccion}</td>
                <td>${person.fecha_registro}</td>
                <td>
                    <button class="edit-btn" data-id="${person.id}">Editar</button>
                    <button class="delete-btn" data-id="${person.id}">Eliminar</button>
                </td>
            </tr>`;
            tbody.append(row).hide().fadeIn("slow");
        });
    }

    // Actualizar paginación
    function updatePagination(totalPages) {
        $('#page-info').text(`Página ${currentPage} de ${totalPages}`);
        $('#prev').prop('disabled', currentPage <= 1);
        $('#next').prop('disabled', currentPage >= totalPages);
    }

    // Diálogo de notificaciones
    function showDialog(message, type = "info") {
        $("#dialog").html(message).dialog({
            modal: true,
            buttons: {
                Ok: function () {
                    $(this).dialog("close");
                }
            }
        });
    }

    // Eventos de filtros
    $('#search-btn').click(() => loadData($('#search').val(), $('#order').val()));
    $('#order').change(() => loadData($('#search').val(), $('#order').val()));
    $('#prev').click(() => { currentPage--; loadData(); });
    $('#next').click(() => { currentPage++; loadData(); });

    // Otras acciones como agregar, editar y eliminar
    $('#add-btn').click(() => {
        // Agregar persona (implementación omitida por brevedad)
    });

    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'delete_person.php',
            method: 'POST',
            data: { id },
            success: function () {
                $(`#row-${id}`).fadeOut("slow", function () {
                    $(this).remove();
                });
            },
            error: function () {
                showDialog("Error al eliminar el registro.", "error");
            }
        });
    });
});
