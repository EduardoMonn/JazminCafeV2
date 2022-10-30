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

</head>

<body id="main-body">
<?php
session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'cabeceraInicio.php';
} else {
    require_once 'cabecera.php';
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
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold"><i class="far fa-copyright"></i>&copy;2022, Equipo 4</h5>
						</li>
						<li> Todos los derechos reservados </li>
					</ul>
				</div>
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold">Jazmín Café</h5>
						</li>
						<li><i class="fas fa-map-marker-alt fa-fw"></i> la pila, las margaritas, Comitán</li>
					</ul>
				</div>
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold">Siguenos en:</h5>
						</li>
						<li>
							<a href="https://es-la.facebook.com/CarlosAlfaroES/" class="footer-link" target="_blank">
								<i class="fab fa-facebook fa-fw"></i> Facebook
							</a>
						</li>

						<li>
							<a href="https://www.youtube.com/c/CarlosAlfaro007" class="footer-link" target="_blank">
								<i class="fab fa-instagram fa-fw"></i> Instagram
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>


	<!-- MDBootstrap V5 -->
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