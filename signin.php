<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Restaurant</title>

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
	<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

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

<body id="main-body">
<?php
session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'headerInicio.php';
} else {
    require_once 'header.php';
}
?>
	<!-- comienza seccion de login -->
	<section class="container-signin">
		<div class="login-content div-bordered mb-4">
			<figure class="full-box mb-4">
				<img src="./assets/img/Avatar_default_male.png" alt="" class="img-fluid login-icon">
			</figure>
			<form action="" class="formulario_login" id="formulario_login" method="POST">
				<div class="form-outline mb-4">
					<input type="email" class="form-control" id="correo" name="correo" maxlength="50">
					<label for="login_email" class="form-label"><i class="fas fa-envelope-open-text"></i> &nbsp; Email</label>
				</div>
				<div class="form-outline mb-4">
					<input type="password" class="form-control" id="password" name="password" maxlength="100">
					<label for="login_clave" class="form-label"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
				</div>
				<button type="submit" class="btn btn-primary text-center mb-4 w-100">LOG IN</button>
			</form>
		</div>
		<p class="text-center poppins-regular">¿No tienes cuenta? <a href="registration.php" class="font-weight-bold">Regístrate aquí</a></p>
	</section>

	<!-- Footer o pie de pagina -->
	<?PHP
    include_once 'footer.php';
    ?>


	<!-- MDBootstrap V5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<!--  -->
	<script src="./js/mdb.min.js"></script>
	<!-- General scripts -->
	<script src="./js/main.js"></script>
	<script src="jquery/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="popper/popper.min.js"></script>
	<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="ValidacionDatos.js"></script>
</body>

</html>