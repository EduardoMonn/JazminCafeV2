$(document).ready(function () {
    tablaCategorias= $("#tablaCategorias").DataTable({
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
        $("#formCategorias").trigger("reset");
        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalCategorias").modal("show");
        CvCategoria = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        CvCategoria = parseInt(fila.find('td:eq(0)').text());
        DsCategoria = fila.find('td:eq(1)').text();

        $("#categorias").val(DsCategoria);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalCategorias").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        CvCategoria = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + CvCategoria + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudCategorias.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, CvCategoria: CvCategoria },
                success: function () {
                    tablaCategorias.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formCategorias").submit(function (e) {
        e.preventDefault();
        DsCategoria = $.trim($("#categorias").val());
        $.ajax({
            url: "bd/crudCategorias.php",
            type: "POST",
            dataType: "json",
            data: {DsCategoria: DsCategoria , CvCategoria: CvCategoria, opcion: opcion },
            success: function (data) {
                console.log(data);
                CvCategoria = data[0].CvCategoria;
                DsCategoria = data[0].DsCategoria;
                if (opcion == 1) { tablaCategorias.row.add([CvCategoria, DsCategoria]).draw(); }
                else { tablaCategorias.row(fila).data([CvCategoria, DsCategoria]).draw(); }
            }
        });
        $("#modalCategorias").modal("hide");
    });
});