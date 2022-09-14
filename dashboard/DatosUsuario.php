<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de usuarios</h1>
    <?php
    include 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT IdUsuario, nombre, correo, usuario, password, voto FROM Tusuarios WHERE Rol_Id='2'";
    $resultado = $conexion->prepare($consulta);
    
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php 
    if (isset($_POST['btnReinicio'])) {
        $consulta = "UPDATE Tusuarios SET voto=0 WHERE Rol_Id=2";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    echo '<script>window.location.href="DatosUsuario.php";</script>';
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>
            </div> <br> <br>
            <form action="" method="POST">
            <div class="col-lg-2">
            <input type="submit" name="btnReinicio" class="btn btn-dark" data-toggle="modal" value="Reinciar Encuestas">
            </div>
            </form>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaUsuario" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Usuarios</th>
                                <th>Contraseña</th>
                                <th>Votos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['IdUsuario'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['correo'] ?></td>
                                    <td><?php echo $dat['usuario'] ?></td>
                                    <td><?php echo $dat['password'] ?></td>
                                    <td><?php echo $dat['voto'] ?></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formUsuario">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="correo" class="col-form-label">Correo:</label>
                            <input type="text" class="form-control" id="correo">
                        </div>
                        <div class="form-group">
                            <label for="usuario" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuario">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Contraseña:</label>
                            <input type="text" class="form-control" id="password">
                        </div>
                     
                        <div class="form-group">
                            <label for="rol" class="col-form-label">Rol:</label>
                            <select name="rol" id="rol">
                                <?php 
                                include ("../PHP/conexion.php");
                                $query = $mysqli -> query ("SELECT * FROM Roles WHERE Id>1 ");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valores["Id"].'">'.$valores["rol"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior_usuario.php" ?>