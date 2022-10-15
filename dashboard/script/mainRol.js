$(document).ready(function () {
    tablaRol= $("#tablaRol").DataTable({
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
        $("#formRol").trigger("reset");
        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalRol").modal("show");
        Id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        Id = parseInt(fila.find('td:eq(0)').text());
        rol = fila.find('td:eq(1)').text();

        $("#rol").val(rol);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalRol").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        Id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + Id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudRol.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, Id: Id },
                success: function () {
                    tablaRol.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formRol").submit(function (e) {
        e.preventDefault();
        rol = $.trim($("#rol").val());
        $.ajax({
            url: "bd/crudRol.php",
            type: "POST",
            dataType: "json",
            data: {rol: rol , Id: Id, opcion: opcion },
            success: function (data) {
                console.log(data);
                Id = data[0].Id;
                rol = data[0].rol;
                if (opcion == 1) { tablaRol.row.add([Id, rol]).draw(); }
                else { tablaRol.row(fila).data([Id, rol]).draw(); }
            }
        });
        $("#modalRol").modal("hide");

    });

});