<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'headerInicio.php';
} else {
    require_once 'header.php';
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
    
    <!--+ eslitos css -->
    <!-- footer -->
    <link rel="stylesheet" href="css/estiloFooter.css">
    <!-- productos -->
    <link rel="stylesheet" href="css/estiloProductos.css">
    <!-- slider -->
    <link rel="stylesheet" href="css/estiloSlider.css">
    <!-- barra -->
    <link rel="stylesheet" href="css/estiloBarra.css">

    <!--+ kid para los iconos de la web  -->
    <script src="https://kit.fontawesome.com/0b2cf726a6.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--! slider principal  -->
    <div class="slide">
        <div class="slide-inner">
            <input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden="" checked="checked">
            <div class="slide-item">
                <img src="assets/img/1.jpg">
            </div>
            <input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="assets/img/4.jpg">
            </div>
            <input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <img src="assets/img/5.jpg">
            </div>
            <label for="slide-3" class="slide-control prev control-1">‹</label>
            <label for="slide-2" class="slide-control next control-1">›</label>
            <label for="slide-1" class="slide-control prev control-2">‹</label>
            <label for="slide-3" class="slide-control next control-2">›</label>
            <label for="slide-2" class="slide-control prev control-3">‹</label>
            <label for="slide-1" class="slide-control next control-3">›</label>
            <ol class="slide-indicador">
                <li>
                    <label for="slide-1" class="slide-circulo">•</label>
                </li>
                <li>
                    <label for="slide-2" class="slide-circulo">•</label>
                </li>
                <li>
                    <label for="slide-3" class="slide-circulo">•</label>
                </li>
            </ol>
        </div>
    </div>

    <!--! productos -->
    <div class="mai-content">
        <div class="content-page">
            <div class="title-section">Productos más vendidos!!</div>
            <div class="products-list">

                <?PHP
                // nos conectamos a la base de datos
                $con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');

                // Hacemos nuestra consulta mysql
                $Consulta_mysqli = $con->query("SELECT * FROM productos WHERE Stock <= 20 AND Stock > 0");

                // mostramos resultados
                while ($res = mysqli_fetch_assoc($Consulta_mysqli)) {
                ?>
                    <div class="products-box">
                        <a href="details.php?clave=<?= $res['CvProducto'] ?>">
                            <div class="product">
                                <img src="assets/img/descarga.png" alt="">
                                <div class="detail-title"><?= $res['DsProducto'] ?></div>
                                <div class="detail-description"><?= $res['Contenido'] ?> gr</div>
                                <div class="detail-price">$ <?= $res['Precio'] ?><span>00</span></div>

                                <!-- <div class="text-center card-product-options" style="padding: 10px 0;">
                                    <button type="button" class="btn btn-link btn-sm btn-rounded text-success"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                                    &nbsp; &nbsp;
                                    <a href="details.php" class="btn btn-link btn-sm btn-rounded"><i class="fas fa-box-open fa-fw"></i> &nbsp; Detalles</a>
                                    &nbsp; &nbsp;
                                </div> -->

                            </div>

                        </a>

                    </div>

                <?PHP
                }
                ?>

            </div>
        </div>
    </div>

    <!--! footer o pie de pagina -->
    <?PHP
    include_once 'footer.php';
    ?>

    <!-- MDBootstrap V5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/mdb.min.js"></script>
    <!-- General scripts -->
    <script src="./js/main.js"></script>
</body>

</html>