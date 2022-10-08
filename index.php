
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION['s_correo'])){
    include 'cabeceraInicio.php';
}
else{
    include 'cabecera.php';
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
    <!-- barra  -->
    <!-- <link rel="stylesheet" href="css/estiloBarra.css"> -->
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

    <!--! encabezado  -->
    

    <!--! slider principal  -->
    <div class="contenedor">
        <div class="slider">
            <ul>
                <li><img src="assets/img/1.jpg" alt=""></li>
                <li><img src="assets/img/2.jpg" alt=""></li>
                <li><img src="assets/img/3.jpg" alt=""></li>
                <li><img src="assets/img/4.jpg" alt=""></li>

            </ul>
        </div>
    </div>

    <!--! productos -->
    <div class="mai-content">
        <div class="content-page">
            <div class="title-section">Productos</div>
            <div class="products-list">

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

                <div class="products-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/img/descarga.png" alt="">
                            <div class="detail-title">Cafe negro</div>
                            <div class="detail-description">Cafe en grano negro</div>
                            <div class="detail-price">$ 20.<samp>99</samp></div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!--! footer o pie de pagina -->
    <footer>
        <img src="assets/img/incono.png" alt="" class="logo_F">
        <div class="social-incons-container">
            <a href="" class="social-incon"></a>
            <a href="" class="social-incon"></a>
            <a href="" class="social-incon"></a>
            <a href="" class="social-incon"></a>
        </div>
        <ul class="footer-menu-container">
            <li class="menu-item">Legal</li>
            <li class="menu-item">Privacy</li>
            <li class="menu-item">Cookies</li>
        </ul>
        <span class="copyrigth">&copy;2022, Equipo 4. Todos los derechos reservados.</span>
    </footer>

    <script src="./js/mdb.min.js"></script>

	<!-- General scripts -->
	<script src="./js/main.js"></script>
</body>

</html>