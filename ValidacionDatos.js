$('#formulario_login').submit(function (e) {
    e.preventDefault();
    var correo = $.trim($("#correo").val());
    var password = $.trim($("#password").val());
    //alert(password);

    if (correo.lenght == "" || password == "") {
        Swal.fire({
            icon: "warning",
            title: "Debe Ingresar un Usuario y/o Contraseña",
        });
        return false;
    } else {
        $.ajax({
            url: "PHP/IngresoUsuarios.php",
            type: "POST",
            datatype: "json",
            data: { correo: correo, password: password },
            success: function (data) {
                if (data == "null") {
                    Swal.fire({
                        icon: "error",
                        title: "usuario y/o contraseña incorrectos",
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "signin.php";
                        }
                    });
                } else if (data == "1") {
                    Swal.fire({
                        icon: "warning",
                        title: "Demasiados intentos fallidos, Intentelo de nuevo en 1 minuto",
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "index.php";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "success",
                        title: "Conexion establecida, Bienvenido",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ingresar"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "dashboard/dash.php";
                        }
                    });
                }
            }
        });
    }
});


//ACA COMIENZA LA VALIDACION PARA EL REGISTRO DE USUARIOS
$('#formulario_registro').submit(function (e) {
    e.preventDefault();
    var nombre = $.trim($("#nombre").val());
    var apellido = $.trim($("#apellido").val());
    var telefono = $.trim($("#telefono").val());
    var correo = $.trim($("#correo").val());
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());
    if (nombre.lenght == "" || apellido.lenght == "" || telefono == "" || correo.lenght == "" || usuario.lenght == "" || password == "") {
        Swal.fire({
            icon: "warning",
            title: "Debe llenar los campos",
        });
        return false;
    } else {
        $.ajax({
            url: "PHP/RegistroUsuarios.php",
            type: "POST",
            datatype: "json",
            data: { nombre: nombre, apellido: apellido, telefono: telefono, correo: correo, usuario: usuario, password: password },
            success: function (resul) {
                if (resul == 1) {
                    Swal.fire({
                        icon: "success",
                        title: "Tus datos se han guardado",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ingresar"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "index.php";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "El correo ya existe, prueba con otro",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ok"
                    })
                }
            }
        });
    }
});