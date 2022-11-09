
$(document).ready(function () {
    tablaProductos = $("#tablaProductos").DataTable({
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
        $("#formProductos").trigger("reset");
        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalCRUD").modal("show");
        CvProducto = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        CvProducto = parseInt(fila.find('td:eq(0)').text());
        DsProducto = fila.find('td:eq(1)').text();
        Contenido = fila.find('td:eq(2)').text();
        CvProveedor = parseInt(fila.find('td:eq(3)').text());
        CvCategoria = parseInt(fila.find('td:eq(4)').text());
        Precio = fila.find('td:eq(5)').text();
        Stock = fila.find('td:eq(6)').text();

        $("#DsProducto").val(DsProducto);
        $("#Contenido").val(Contenido);
        $("#CvProveedor").val(CvProveedor);
        $("#CvCategoria").val(CvCategoria);
        $("#Precio").val(Precio);
        $("#Stock").val(Stock);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        CvProducto = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + CvProducto + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudProductos.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, CvProducto: CvProducto },
                success: function () {
                    tablaProductos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


    $("#formProductos").submit(function (e) {
        e.preventDefault();
        DsProducto = $.trim($("#DsProducto").val());
        Contenido = $.trim($("#Contenido").val());
        CvProveedor = $.trim($("#CvProveedor").val());
        CvCategoria = $.trim($("#CvCategoria").val());
        Precio = $.trim($("#Precio").val());
        Stock = $.trim($("#Stock").val());
        $.ajax({
            url: "bd/crudProductos.php",
            type: "POST",
            dataType: "json",
            data: {DsProducto: DsProducto, Contenido: Contenido, CvProveedor: CvProveedor, CvCategoria: CvCategoria, Precio: Precio, Stock: Stock , CvProducto: CvProducto, opcion: opcion },
            success: function (data) {
                console.log(data);
                CvProducto = data[0].CvProducto;
                DsProducto = data[0].DsProducto;
                Contenido = data[0].Contenido;
                CvProveedor = data[0].CvProveedor;
                CvCategoria = data[0].CvCategoria;
                Precio = data[0].Precio;
                Stock = data[0].Stock;
                if (opcion == 1) { tablaProductos.row.add([CvProducto, DsProducto, Contenido, CvProveedor, CvCategoria, Precio, Stock]).draw(); }
                else { tablaProductos.row(fila).data([CvProducto, DsProducto, Contenido, CvProveedor, CvCategoria, Precio, Stock]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });
});