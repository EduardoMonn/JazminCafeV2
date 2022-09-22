<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de productos</h1>
    <?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT CvProducto,DsProducto,Contenido,CvProveedor,CvCategoria,Precio,Stock FROM Productos";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaJuego" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Clave</th>
                                <th>Producto</th>
                                <th>Contenido</th>
                                <th>Proveedor</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['CvProducto'] ?></td>
                                    <td><?php echo $dat['DsProducto'] ?></td>
                                    <td><?php echo $dat['Contenido'] ?></td>
                                    <td><?php echo $dat['CvProveedor'] ?></td>
                                    <td><?php echo $dat['CvCategoria'] ?></td>
                                    <td><?php echo $dat['Precio']?></td>
                                    <td><?php echo $dat['Stock']?></td>
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
                <form id="formJuego">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="genero" class="col-form-label">Genero:</label>
                            <input type="text" class="form-control" id="genero">
                        </div>
                        <div class="form-group">
                            <label for="instrucciones" class="col-form-label">Instrucciones:</label>
                            <input type="text" class="form-control" id="instrucciones">
                        </div>
                        <div class="form-group">
                            <label for="repositorio" class="col-form-label">Repositorio:</label>
                            <input type="text" class="form-control" id="repositorio">
                        </div>
                        <div class="form-group">
                            <label for="url_img" class="col-form-label">url_img</label>
                            <input type="text" class="form-control" id="url_img">
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
<?php require_once "vistas/parte_inferior_productos.php" ?>