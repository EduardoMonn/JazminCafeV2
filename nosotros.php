<!DOCTYPE html>
<html lang="en">

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
<!-- nosotros -->
<link rel="stylesheet" href="css/estiloNoso.css">
<!-- barra -->
<link rel="stylesheet" href="css/estiloBarra.css">

<!--+ kid para los iconos de la web  -->
<script src="https://kit.fontawesome.com/0b2cf726a6.js" crossorigin="anonymous"></script>

</head>

<body class="body">
    <!-- header -->
    <?PHP
    include_once 'header.php';
    ?>

    <div class="content">
        <section class="box">
            <img src="assets/img/jazminCafeLogo.jpeg" width="180" alt="" class="box-img">
            <h1>Jazzmin Cafe</h1>
            <h2>El mejor cafe que vera</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis,
                blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at,
                cupiditate.</p>
            <!-- <ul>
                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            </ul> -->
        </section>
    </div>


    <!-- footer -->
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