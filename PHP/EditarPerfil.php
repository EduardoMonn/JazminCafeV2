<?php
session_start();
if ($_SESSION["s_correo"] == null) {
    header("Location:../index.php");
}
include "FuncionUsuario.php";
?>
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <title>Perfil de Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/avatarPerfil.js"></script>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- MDBootstrap V5 -->
    <link rel="stylesheet" href="../css/mdb.min.css">

    <!-- Font Awesome V5.15.1 -->
    <link rel="stylesheet" href="../css/all.css">

    <!-- Sweet Alert V10.13.0 -->
    <!-- <script src="../js/sweetalert2.js"></script> -->

    <!-- General Styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    require "conexionPerfil.php";
    $sqlA = $mysqli->query("SELECT * FROM Usuarios WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "'");
    $rowA = $sqlA->fetch_array();
    include 'barraPerfil.php'
    ?>
    <hr>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h1><?php echo $_SESSION["s_correo"]; ?></h1>
            </div>
            <!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div> -->
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->

                <!-- Agregar imagenes a la DB -->
                <?php
                if (isset($_REQUEST['guardarFoto'])) {
                    if ($_FILES['foto']['name']) {
                        $tipoArchivo = $_FILES['foto']['type'];
                        $nombreArchivo = $_FILES['foto']['name'];
                        $tamanoArchivo = $_FILES['foto']['size'];
                        $imagenSubida = fopen($_FILES['foto']['tmp_name'],'r');
                        $binariosImagen = fread($imagenSubida,$tamanoArchivo);
                        include_once '../PHP/conexionPerfil.php';
                        $con = mysqli_connect("localhost", "root", "", "JazminCafeDB");
                        $binariosImagen=mysqli_escape_string($con,$binariosImagen);
                        $query = ("UPDATE Usuarios SET nombreimg='".$nombreArchivo."', img='".$binariosImagen."', tipoimg='".$tipoArchivo."' WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "'");
                        
                        $res = mysqli_query($con,$query);
                        if ($res) {
                            echo '<script>
                                                swal("Excelente!", "Se ha actualizado tu foto de perfil", "success")
                                                .then((value) => {
                                                    window.location.href = "EditarPerfil.php";
                                                });
                                            </script>';
                        }
                        else{
                            echo '<script>
                                        swal("Advertencia!", "Tu perfil no se ha actualizado", "warning")
                                        .then((value) => {
                                            window.location.href = "EditarPerfil.php";
                                        });
                                    </script>';
                        }
                    }
                }
                ?>

                <!-- convertir en imagen el binario -->
                <?php
                include_once '../PHP/conexionPerfil.php';
                $con = mysqli_connect("localhost", "root", "", "JazminCafeDB");
                $query = ("SELECT nombreimg, img, tipoimg FROM Usuarios WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "' ");
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                
                
                <form method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="data:image/<?php echo $row['tipoimg'] ?>;base64,<?php echo base64_encode($row['img']) ?>" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50%;">
                    <h6>sube una foto diferente...</h6>
                    <input type="file" class="text-center center-block file-upload" name="foto">
                    <br>
                    <hr>
                    
                <button class="btn btn-lg btn-success" name="guardarFoto" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Guardar foto</button>
                </div>
                </form>
                
                </hr><br>
                <?php
                }?>
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs" style="padding-left: 40px;">
                    <li class="active"><a data-toggle="tab" href="#home" >Perfil</a></li>
                    <li><a data-toggle="tab" href="#messages">Cambio de contraseña</a></li>
                    <!-- <li><a data-toggle="tab" href="#settings">Menu 2</a></li> -->
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="" method="post" id="form1" style="padding-left: 40px;">
                            <!-- editamos los datos de perfil -->
                            <?php
                            if (isset($_POST['EditarDatosPerfil'])) {
                                include_once '../PHP/ConexionDB.php';
                                $objeto = new Conexion();
                                $conexion = $objeto->Conectar();
                                $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
                                $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
                                $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
                                $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
                                $sqlE = $conexion->query("UPDATE Usuarios SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', usuario = '$usuario' WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "'");
                                if ($sqlE) {
                                    echo '<script>
                                                swal("Excelente!", "Se ha actualizado tus datos", "success")
                                                .then((value) => {
                                                    window.location.href = "EditarPerfil.php";
                                                });
                                            </script>';
                                }else{
                                    echo '<script>
                                        swal("Advertencia!", "Tus datos no se han actualizado", "warning")
                                        .then((value) => {
                                            window.location.href = "EditarPerfil.php";
                                        });
                                    </script>';
                                }
                            }
                            ?>
                            <script>
                                function mayus(e){
                                e.value = e.value.toUpperCase();
                            }
                            </script>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>Nombre</h4>
                                    </label>
                                    <input type="text" onkeyup="mayus(this);" style="color: #980134;" class="form-control" name="nombre" id="nombre" value="<?php echo $rowA['nombre']; ?>" title="ingresa tu nombre">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Apellidos</h4>
                                    </label>
                                    <input type="text" onkeyup="mayus(this);" style="color: #980134;" class="form-control" name="apellido" id="apellido" value="<?php echo $rowA['apellido']; ?>" title="ingresa tu apellido">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Telefono</h4>
                                    </label>
                                    <input type="text" style="color: #980134;" class="form-control" name="telefono" id="telefono" value="<?php echo $rowA['telefono']; ?>" title="ingresa tu numero telefonico">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="correo">
                                        <h4>Correo</h4>
                                    </label>
                                    <input type="email" style="color: #980134;" class="form-control" name="correo" id="correo" value="<?php echo $rowA['correo']; ?>" title="ingresa tu correo personal" disabled>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="usuario">
                                        <h4>Usuario</h4>
                                    </label>
                                    <input type="text" onkeyup="mayus(this);" style="color: #980134;" class="form-control" name="usuario" id="usuario" value="<?php echo $rowA['usuario']; ?>" title="ingresa tu usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" name="EditarDatosPerfil" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                                    <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                        <hr>
                        <form class="form" action="" method="post" id="form2" style="padding-left: 40px;">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password">
                                        <h4>Contraseña Actual</h4>
                                    </label>
                                    <input type="password" class="form-control" name="passActual" placeholder="Contraseña actual" title="ingresa tu contraseña" required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password2">
                                        <h4>Contraeña Nueva</h4>
                                    </label>
                                    <input type="password" class="form-control" name="pass1" placeholder="Contraseña nueva" title="ingresa tu contraseña nueva." required>
                                    <div style="color:red; font-size: 12px;"><?php if (isset($existe)) {
                                                                                    echo $existe;
                                                                                } ?></div>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password2">
                                        <h4>Verificación de Contraseña</h4>
                                    </label>
                                    <input type="password" class="form-control" name="pass2" placeholder="Confirmacion de contraseña" title="ingresa la confirmacion." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" name="editar"><i class="glyphicon glyphicon-ok-sign"></i> Editar</button>
                                    <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                </div>
                                <?php
                                if (isset($_POST['editar'])) {
                                    require "conexionPerfil.php";
                                    $passActual = $mysqli->real_escape_string($_POST['passActual']);
                                    $pass1 = $mysqli->real_escape_string($_POST['pass1']);
                                    $pass2 = $mysqli->real_escape_string($_POST['pass2']);
                                    $passActual = md5($passActual);
                                    $pass1 = md5($pass1);
                                    $pass2 = md5($pass2);
                                    $sqlA = $mysqli->query("SELECT password FROM Usuarios WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "'");
                                    $rowA = $sqlA->fetch_array();
                                    if ($rowA['password'] == $passActual) {
                                        if ($pass1 == $pass2) {
                                            $update = $mysqli->query("UPDATE Usuarios SET password = '$pass1' WHERE IdUsuario = '" . $_SESSION['s_IdUsuario'] . "'");
                                            if ($update) {
                                                // echo  "<label style = 'margin-left: 108px; margin-bottom: 30px; color: yellow; font-size: 16px; padding:6px 9px;font-weight: 600;'>se ha actualizado tu contraseña</label>";
                                                echo '<script>
                                                swal("Excelente!", "Se ha actualizado tu contraseña", "success")
                                                .then((value) => {
                                                    window.location.href = "EditarPerfil.php";
                                                });
                                            </script>';
                                            }
                                        } else {
                                            echo '<script>
                                                swal("Error!", "Las dos contraseñas no coinciden", "error")
                                                .then((value) => {
                                                    window.location.href = "EditarPerfil.php";
                                                });
                                            </script>';
                                        }
                                    } else {
                                        echo '<script>
                                        swal("Advertencia!", "Tu contraseña actual no coincide", "warning")
                                        .then((value) => {
                                            window.location.href = "EditarPerfil.php";
                                        });
                                    </script>';
                                    }
                                }
                                ?>
                            </div>
                        </form>

                    </div>
                    <script src="../js/mdb.min.js"></script>
                    <!-- General scripts -->
                    <script src="../js/main.js"></script>
</body>

</html>