<!DOCTYPE html>
<html lang="es">
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
											name="apellido" id="apellido" maxlength="35">
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


	<!-- Footer o pie de pagina -->
	<?PHP
    include_once 'footer.php';
    ?>

	<!-- MDBootstrap V5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<!--  -->
    <!-- General scripts -->
    <script src="./js/main.js"></script>
	<!-- MDBootstrap V5 -->
	<script src="./js/mdb.min.js"></script>


	<script src="jquery/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="popper/popper.min.js"></script>
	<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="ValidacionDatos.js"></script>

	
</body>

</html>