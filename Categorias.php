<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JazCafe</title>

    <!--+ eslitos css -->
    <!-- barra  -->
    <link rel="stylesheet" href="css/estiloBarra.css">
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

    <!--! encabesado  -->
    <header>
        <div class="logo_B">
            <a href="index.php"><img src="assets/img/JazminCafe.png" alt=""></a>
        </div>
        <nav>
            <ul class="nav_list">
                <li class="list_link"><a href="Categorias.php">Categorias</a></li>
                <li class="list_link"><a href="nosotros.php">Nosotros</a></li>
            </ul>
        </nav>
        <li class="btn"><a href="signin.php"><i class="fa-solid fa-user-check"></i> Iniciar sesion</a></li>
    </header>

    <!--! categorias  -->
    <div class="select">
        <select name="format" id="format">
            <option selected disabled>Grano</option>
            <option value="1">Molido</option>
            <option value="2">1Kg</option>
            <option value="3">1/2Kg</option>
            <option value="4">1/4Kg</option>
        </select>
    </div>

    <!--! productos -->
    <div class="mai-content">
        <div class="content-page">
            <div class="title-section"></div>
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

</body>

</html>