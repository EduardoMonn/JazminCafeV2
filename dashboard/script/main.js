$(document).ready(function () {
    tablaAdministrador = $("#tablaAdministrador").DataTable({
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
        $("#formAdministrador").trigger("reset");
        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ingresa los datos");
        $("#modalCRUD").modal("show");
        IdUsuario = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        IdUsuario = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        apellido = fila.find('td:eq(2)').text();
        telefono = fila.find('td:eq(3)').text();
        correo = fila.find('td:eq(4)').text();
        usuario = fila.find('td:eq(5)').text();
        password = fila.find('td:eq(6)').text();

        $("#nombre").val(nombre);
        $("#apellido").val(apellido);
        $("#telefono").val(telefono);
        $("#correo").val(correo);
        $("#usuario").val(usuario);
        $("#password").val(password);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#980134");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Información");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        IdUsuario = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + IdUsuario + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, IdUsuario: IdUsuario },
                success: function () {
                    tablaAdministrador.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formAdministrador").submit(function (e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        apellido = $.trim($("#apellido").val());
        telefono = $.trim($("#telefono").val());
        correo = $.trim($("#correo").val());
        usuario = $.trim($("#usuario").val());
        password = $.trim($("#password").val());
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {nombre: nombre, apellido: apellido, telefono: telefono, correo: correo, usuario: usuario, password: password , IdUsuario: IdUsuario, opcion: opcion },
            success: function (data) {
                console.log(data);
                IdUsuario = data[0].IdUsuario;
                nombre = data[0].nombre;
                apellido = data[0].apellido;
                telefono = data[0].telefono;
                correo = data[0].correo;
                usuario = data[0].usuario;
                password = data[0].password;
                if (opcion == 1) { tablaAdministrador.row.add([IdUsuario, nombre, apellido, telefono, correo, usuario, password]).draw(); }
                else { tablaAdministrador.row(fila).data([IdUsuario, nombre, apellido, telefono, correo, usuario, password]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});