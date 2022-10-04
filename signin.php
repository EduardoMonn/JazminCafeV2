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

	<!-- Header full-box-->
	<header class="header">
		<div class="header-brand">
			<a href="index.php">
				<img src="./assets/img/JazminCafe.png">
			</a>
		</div>

		<div class="header-options full-box">
			<nav class="header-navbar full-box poppins-regular font-weight-bold scroll" onclick="show_menu_mobile()">
				<ul class="list-unstyled full-box">
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<li>
						<a href="Categorias.php">Menú</a>
					</li>
					<li>
						<a href="registration.php">Regístrate</a>
					</li>
					<li>
						<a href="signin.php">Login</a>
					</li>
				</ul>
			</nav>
			<a href="bag.php" class="header-button full-box text-center" title="Carrito">
				<i class="fas fa-shopping-bag"></i>
				<span class="badge bg-primary rounded-pill bag-count">2</span>
			</a>

			<div class="header-button full-box text-center" id="userMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Nombre de usuario">
				<i class="fas fa-user-circle"></i>
			</div>
			<div class="dropdown-menu div-bordered popup-login" aria-labelledby="userMenu">
				<p class="text-center" style="padding-top: 10px;">
					<i class="fas fa-user-circle fa-3x"></i><br>
					<small>Nombre de usuario</small>
				</p>
				<a class="dropdown-item" href="javascript:void(0);">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard
				</a>
				<a class="dropdown-item" href="javascript:void(0);">
					<i class="fas fa-sign-out-alt"></i> &nbsp; Cerrar sesión
				</a>
			</div>

			<a href="javascript:void(0);" class="header-button full-box text-center d-lg-none" title="Menú" onclick="show_menu_mobile()">
				<i class="fas fa-bars"></i>
			</a>
		</div>
	</header>


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