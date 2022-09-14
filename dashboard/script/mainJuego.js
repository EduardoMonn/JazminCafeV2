$(document).ready(function () {
    tablaJuego = $("#tablaJuego").DataTable({
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
        $("#formJuego").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalCRUD").modal("show");
        IdJuego = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        IdJuego = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        genero = fila.find('td:eq(2)').text();
        instrucciones = fila.find('td:eq(3)').text();
        repositorio = fila.find('td:eq(4)').text();
        url_img = fila.find('td:eq(5)').text();

        $("#nombre").val(nombre);
        $("#genero").val(genero);
        $("#instrucciones").val(instrucciones);
        $("#repositorio").val(repositorio);
        $("#url_img").val(url_img);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        IdJuego = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + IdJuego + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudJuego.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, IdJuego: IdJuego },
                success: function () {
                    tablaJuego.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formJuego").submit(function (e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        genero = $.trim($("#genero").val());
        instrucciones = $.trim($("#instrucciones").val());
        repositorio = $.trim($("#repositorio").val());
        url_img = $.trim($("#url_img").val());
        $.ajax({
            url: "bd/crudJuego.php",
            type: "POST",
            dataType: "json",
            data: {nombre: nombre, genero: genero, instrucciones: instrucciones, repositorio: repositorio, url_img:url_img , IdJuego: IdJuego, opcion: opcion },
            success: function (data) {
                console.log(data);
                IdJuego = data[0].IdJuego;
                nombre = data[0].nombre;
                genero = data[0].genero;
                instrucciones = data[0].instrucciones;
                repositorio = data[0].repositorio;
                url_img = data[0].url_img;
                if (opcion == 1) { tablaJuego.row.add([IdJuego, nombre, genero, instrucciones, repositorio,url_img]).draw(); }
                else { tablaJuego.row(fila).data([IdJuego, nombre, genero, instrucciones, repositorio,url_img]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});