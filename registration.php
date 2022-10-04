<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

	
</head>

<body id="main-body">

	<!-- Header -->
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

			<div class="header-button full-box text-center" id="userMenu" data-mdb-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false" title="Nombre de usuario">
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

			<a href="javascript:void(0);" class="header-button full-box text-center d-lg-none" title="Menú"
				onclick="show_menu_mobile()">
				<i class="fas fa-bars"></i>
			</a>
		</div>
	</header>


	<!-- Content -->
	<div class="container container-web-page">
		<h3 class="font-weight-bold poppins-regular text-uppercase">Crear cuenta</h3>
		<p class="text-justify">Al crear una cuenta en nuestro sitio web usted acepta nuestros <a href="#">términos y
				condiciones</a>. La información introducida en el formulario debe de ser clara, precisa y legitima. Para
			crear una cuenta debe de llenar todos los campos que son obligatorios marcados con el icono <i
				class="fab fa-font-awesome-alt"></i></p>
		<hr>
		<div class="row">
			<div class="col-12">
				<form class="formulario_registro" id="formulario_registro" method="POST" style="padding: 15px;">
				<!-- class="formulario_registro" id="formulario_registro" method="POST" -->
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<!-- <div class="col-12 col-md-6">
									<div class="">
										<select class="form-control" name="cliente_tipo_documento_reg"
											id="cliente_tipo_documento">
											<option value="" selected="">Tipo de documento</option>
											<option value="DNI">1 - DNI</option>
											<option value="Cedula">2 - Cedula</option>
											<option value="DUI">3 - DUI</option>
											<option value="Licencia">4 - Licencia</option>
											<option value="Pasaporte">5 - Pasaporte</option>
											<option value="Otro">6 - Otro</option>
										</select>
										<label for="cliente_tipo_documento" class="form-label"></label>
									</div>
								</div> -->

								<!-- <div class="col-12 col-md-6">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-Z0-9-]{7,30}" class="form-control"
											name="cliente_numero_documento_reg" id="cliente_numero_documento"
											maxlength="30">
										<label for="cliente_numero_documento" class="form-label">Numero de documento <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div> -->
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" class="form-control"
											name="nombre" id="nombre" maxlength="35">
										<label for="cliente_nombre" class="form-label">Nombres <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" class="form-control"
											name="apellidos" id="apellidos" maxlength="35">
										<label for="cliente_apellido" class="form-label">Apellidos <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[0-9()+]{8,20}" class="form-control"
											name="telefono" id="telefono" maxlength="20">
										<label for="cliente_telefono" class="form-label">Teléfono <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>

					<br><br>

					<!-- <fieldset>
						<legend><i class="fas fa-map-marked-alt"></i> &nbsp; Información de envió</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" class="form-control"
											name="cliente_provincia_reg" id="cliente_provincia" maxlength="30">
										<label for="cliente_provincia" class="form-label">Estado, provincia o
											departamento <i class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" class="form-control"
											name="cliente_ciudad_reg" id="cliente_ciudad" maxlength="30">
										<label for="cliente_ciudad" class="form-label">Ciudad o pueblo <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,70}"
											class="form-control" name="cliente_direccion_reg" id="cliente_direccion"
											maxlength="70">
										<label for="cliente_direccion" class="form-label">Calle o dirección de casa <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
							</div>
						</div>
					</fieldset> -->

					<br><br>

					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Información de inicio de sesión</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="email" class="form-control" name="correo"
											id="correo" maxlength="47">
										<label for="cliente_email" class="form-label">Email <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="password" class="form-control" name="password"
											id="password"  maxlength="100">
										<label for="cliente_clave_1" class="form-label">Contraseña <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-outline mb-4">
										<input type="text" class="form-control" name="usuario"
											id="usuario" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" maxlength="100">
										<label for="cliente_usuario" class="form-label">Usuario <i
												class="fab fa-font-awesome-alt"></i></label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>

					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-info btn-sm"><i class="far fa-paper-plane"></i> &nbsp;
							CREAR CUENTA</button>
					</p>
					<p class="text-center">
						<small>Los campos marcados con <i class="fab fa-font-awesome-alt"></i> son obligatorios</small>
					</p>
				</form>
			</div>
		</div>
	</div>


	<!-- Footer -->
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
							<h5 class="font-weight-bold">Jazmin Cafe</h5>
						</li>
						<li><i class="fas fa-map-marker-alt fa-fw"></i> La pila, Las margaritas, Comitán</li>
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
								<!-- <i class="fa-brands fa-square-instagram"></i> -->
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