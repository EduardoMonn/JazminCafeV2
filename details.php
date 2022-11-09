<?php
session_start();
if (isset($_SESSION['s_correo'])) {
    require_once 'headerInicio.php';
} else {
    require_once 'header.php';
}
?>

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
	<!-- Contenido -->
	<div class="container container-web-page">
		<h3 class="font-weight-bold poppins-regular text-uppercase">Detalles de platillo</h3>
		<hr>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-5">
					<!--cover imagen principal-->
					<figure class="full-box">
						<img class="img-fluid" src="assets/img/descarga.png" alt="platillo_">
					</figure>

					<!-- Galery -->
					<h5 class="poppins-regular text-uppercase" style="padding-top: 70px;">Galería de imágenes</h5>
					<hr>
					<div class="galery-details full-box">

						<!--cover-->
						<figure class="full-box">
							<a data-fslightbox="gallery" href="assets/img/descarga.png">
								<img class="img-fluid" src="assets/img/descarga.png" alt="cafe">
							</a>
						</figure>

						<!--otras-->
						<figure class="full-box">
							<a data-fslightbox="gallery" href="assets/img/descarga.png">
								<img class="img-fluid" src="assets/img/descarga.png" alt="cafe">
							</a>
						</figure>

						<figure class="full-box">
							<a data-fslightbox="gallery" href="assets/img/descarga.png">
								<img class="img-fluid" src="assets/img/descarga.png" alt="cafe">
							</a>
						</figure>

					</div>
				</div>

				<!-- informacion del cafe XD (abia puesto platillo) -->
				<div class="col-12 col-lg-7">
					<?PHP
					// resibimos la clave del producto
					$clave = $_GET['clave'];
					// creamos coneccion
					$deta = mysqli_connect('localhost', 'root', '', 'jazmincafedb');
					// creamos consulta
					$consulta = $deta->query("SELECT * FROM Productos WHERE CvProducto = '$clave'");
					// mostramos los datos de la consulta como lo aprendi
					while ($row = mysqli_fetch_assoc($consulta)){
					?>
					<h4 class="font-weight-bold poppins-regular tittle-details"><?= $row['DsProducto'] ?></h4>

					<p class="text-justify lead" style="padding: 40px 0;">
						<span class="text-info lead font-weight-bold">Descripción:</span><br>
						Cafe de la mejor calidad.<br>
						La bolsa contiene <?= $row['Contenido'] ?><span style="font-size: 16px;">g</span>.<br>
						Se encuentran <?= $row['Stock'] ?> en existencia.<br>
					</p>

					<p class="lead font-weight-bold">Precio: $<?= $row['Precio'] ?> MXN</p>
					<?PHP
					}
					?>

					<!-- Agregar al carrito -->
					<!-- <form action="" style="padding-top: 70px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-outline mb-4">
										<input type="text" value="1" class="form-control text-center" id="product_cant"
											pattern="[0-9]{1,10}" maxlength="10">
										<label for="product_cant" class="form-label">Cantidad</label>
									</div>
								</div>
								<div class="col-12 col-md-6 text-center">
									<button type="submit" class="btn btn-info"><i class="fas fa-shopping-bag fa-fw"></i>
										&nbsp; Agregar al carrito</button>
								</div>
							</div>
						</div>
					</form> -->

					<!-- Actualizar el carrito -->
					<!-- <form action="" style="padding-top: 70px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-outline mb-4">
										<input type="text" value="1" class="form-control text-center" id="product_cant"
											pattern="[0-9]{1,10}" maxlength="10">
										<label for="product_cant" class="form-label">Cantidad</label>
									</div>
								</div>
								<div class="col-12 col-md-6 text-center">
									<button type="submit" class="btn btn-success"><i class="fas fa-sync fa-fw"></i>
										&nbsp; Actualizar carrito</button>
								</div>
							</div>
						</div>
					</form> -->
				</div>
			</div>
		</div>
	</div>


	<!-- Footer -->
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