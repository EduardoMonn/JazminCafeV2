<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de productos</h1>
    <?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


    $consulta = "SELECT CvProducto, DsProducto, Contenido, Nombre, DsCategoria, Precio, Stock
    FROM Productos, Proveedores, Categorias
    WHERE Productos.CvProveedor=Proveedores.CvProveedor and Productos.CvCategoria=Categorias.CvCategoria;";
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
                    <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Clave</th>
                                <th>Producto</th>
                                <th>Contenido</th>
                                <th>Proveedor</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
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
                                    <td><?php echo $dat['Nombre'] ?></td>
                                    <td><?php echo $dat['DsCategoria'] ?></td>
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
                <form id="formProductos">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="DsProducto" class="col-form-label">Producto:</label>
                            <input type="text" class="form-control" id="DsProducto">
                        </div>
                        <div class="form-group">
                            <label for="Contenido" class="col-form-label">Contenido:</label>
                            <input type="text" class="form-control" id="Contenido">
                        </div>
                        <div class="form-group">
                            <label for="CvProveedor" class="col-form-label">Proveedor:</label>
                            <select name="CvProveedor" class="form-control" id="CvProveedor">
                                <?php 
                                include ("bd/conec.php");
                                $query = $mysqli -> query ("SELECT * FROM Proveedores;");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valor["CvProveedor"].'">'.$valor["Nombre"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="CvCategoria" class="col-form-label">Categoria:</label>
                            <select name="CvCategoria" class="form-control" id="CvCategoria">
                                <?php 
                                include ("bd/conec.php");
                                $query = $mysqli -> query ("SELECT * FROM Categorias;");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valor["CvCategoria"].'">'.$valor["DsCategoria"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Precio" class="col-form-label">Precio:</label>
                            <input type="text" class="form-control" id="Precio">
                        </div>
                        <div class="form-group">
                            <label for="Stock" class="col-form-label">Cantidad:</label>
                            <input type="text" class="form-control" id="Stock">
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
<!--
<div class="form-group">
                            <label for="CvProveedores" class="col-form-label">Proveedor:</label>
                            <select name="CvProveedores" class="form-control" id="CvProveedores">
                                < ?php 
                                include ("bd/conexion.php");
                                $query = $mysqli -> query ("SELECT CvProveedor, Nombre FROM proveedores;");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valor["CvProveedor"].'">'.$valor["Nombre"].'</option>';
                                }
                                ?>
                            </select>
                        </div> -->