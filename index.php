<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'cabeceraInicio.php';
} else {
    require_once 'cabecera.php';
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JazCafe</title>
    <!-- Normalize V8.0.1 -->
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

</head>

<body>
    <!--! slider principal  -->
    <div class="slider">
        <ul>
            <li><img src="assets/img/1.jpg" alt=""></li>
            <li><img src="assets/img/2.jpg" alt=""></li>
            <li><img src="assets/img/3.jpg" alt=""></li>
            <li><img src="assets/img/4.jpg" alt=""></li>
        </ul>
    </div>

    <!--! productos -->
    <div class="mai-content">
        <div class="content-page">
            <div class="title-section">Productos</div>
            <div class="products-list" id="space-list">
                <!-- Consulta sql -->
                <?PHP
                // conexion a la base de datos a huevo ya me la aprendi
                $con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');

                // consulta a la table a huvo ya meros me la aprendo
                $consu = $con->query("SELECT * FROM Productos WHERE Stock LIKE '20'");

                // Mostramos los datos mediante un ciclo por mis huvos
                //se repetira la cantidad de productos
                while ($res = mysqli_fetch_assoc($consu)) {
                ?>
                    <div class="products-box">
                        <a href="">
                            <div class="product">
                                <img src="assets/img/descarga.png" alt="">
                                <div class="detail-title"><?= $res['DsProducto'] ?></div>
                                <div class="detail-description"><?= $res['Contenido'] ?></div>
                                <div class="detail-price">$<?= $res['Precio'] ?><span>00</span></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <!--! footer o pie de pagina -->
    <?PHP include_once 'footer.php' ?>
    <script src="./js/mdb.min.js"></script>
    <!-- General scripts -->
    <script src="./js/main.js"></script>
</body>

</html>