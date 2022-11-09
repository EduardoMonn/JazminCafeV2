<?PHP
include 'PHP/ConexionDB.php';
include 'PHP/carrito.php';
?>
<?php
// session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'headerInicio.php';
} else {
    require_once 'header.php';
}
?>


<link rel="stylesheet" href="./css/normalize.css">

<!-- MDBootstrap V5 -->
<link rel="stylesheet" href="./css/mdb.min.css">

<!-- Font Awesome V5.15.1 -->
<link rel="stylesheet" href="./css/all.css">

<!-- Sweet Alert V10.13.0 -->
<script src="./js/sweetalert2.js"></script>

<!-- General Styles -->
<link rel="stylesheet" href="./css/style.css">

<!-- footer -->
<link rel="stylesheet" href="css/estiloFooter.css">
<!-- slider -->
<link rel="stylesheet" href="css/estiloSlider.css">
<!-- productos -->
<link rel="stylesheet" href="css/estiloProductos.css">

<!--+ kid para los iconos de la web  -->
<script src="https://kit.fontawesome.com/0b2cf726a6.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if (isset($_SESSION['s_correo'])) {
    $objeto = new Conexion();
$conexion = $objeto->Conectar(); 
if ($_POST) {
    $total=0;
    // obtener la sesion de ID
    $SID=session_id();
    foreach ($_SESSION['CarritoCompras'] as $indice=>$producto) {
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
    $consulta="INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');";
    $sentencia = $conexion -> prepare($consulta);

    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$_SESSION['s_correo']);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();
    $idVenta=$conexion->lastInsertId();

    foreach ($_SESSION['CarritoCompras'] as $indice=>$producto) {
        $consulta="INSERT INTO `tbldetalleventa` (`Id`, `IdVenta`, `IdProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) 
        VALUES (NULL, :IdVenta, :IdProducto, :PrecioUnitario, :Cantidad, '0');";
        $sentencia = $conexion -> prepare($consulta);

        $sentencia->bindParam(":IdVenta",$idVenta);
        $sentencia->bindParam(":IdProducto",$producto['ID']);
        $sentencia->bindParam(":PrecioUnitario",$producto['PRECIO']);
        $sentencia->bindParam(":Cantidad",$producto['CANTIDAD']);
        $sentencia->execute();
    }

    
    // echo "<h3>".$total."</h3>";
}
?>
<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar: 
        <h4>$<?php echo number_format($total,2); ?></h4>
    </p>
    <p>Los prodcutos podran ser recogidos una vez se procese el pago <br/>
        <strong>Para mas aclaraciones marca al 963-195-7933</strong>
    </p>
</div>
<?php
}else{
    echo 
    '<script>
    swal("Cuidado!", "Necesitas iniciar sesion para continuar con tu comnpra", "warning")
    .then((value) => {
        window.location.href = "signin.php";
    });
    </script>';
}
?>

<?PHP include_once 'footer.php' ?>
<script src="./js/mdb.min.js"></script>
    <!-- General scripts -->
    <script src="./js/main.js"></script>