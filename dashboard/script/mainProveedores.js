$(document).ready(function () {
    tablaProveedores= $("#tablaProveedores").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    $("#btnNuevo").click(function () {
        $("#formProveedores").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalProveedores").modal("show");
        CvProveedor = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        CvProveedor = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        empresa = fila.find('td:eq(2)').text();
        telefono = fila.find('td:eq(3)').text();

        $("#nombre").val(nombre);
        $("#empresa").val(empresa);
        $("#telefono").val(telefono);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalProveedores").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        CvProveedor = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + CvProveedor + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudProveedores.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, CvProveedor: CvProveedor },
                success: function () {
                    tablaProveedores.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formProveedores").submit(function (e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        empresa = $.trim($("#empresa").val());
        telefono = $.trim($("#telefono").val());

        $.ajax({
            url: "bd/crudProveedores.php",
            type: "POST",
            dataType: "json",
            data: {nombre: nombre, empresa:empresa, telefono:telefono, CvProveedor: CvProveedor, opcion: opcion },
            success: function (data) {
                console.log(data);
                CvProveedor = data[0].CvProveedor;
                nombre = data[0].nombre;
                empresa = data[0].empresa;
                telefono = data[0].telefono;
                if (opcion == 1) { tablaProveedores.row.add([CvProveedor, nombre, empresa, telefono]).draw(); }
                else { tablaProveedores.row(fila).data([CvProveedor, nombre, empresa, telefono]).draw(); }
            }
        });
        $("#modalProveedores").modal("hide");
    });
});