<?PHP
include 'PHP/carrito.php';
?>
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

</head>

<body id="main-body">

	<!-- Header -->
	<?php
	if (isset($_SESSION['s_correo'])) {
		require_once 'cabeceraInicio.php';
	} else {
		require_once 'cabecera.php';
	}
	?>

	<!-- condicion para validar is hay algo guardado en carrito -->
	<?php if (!empty($_SESSION['CarritoCompras'])) {
	
	?>
	<!-- Content -->
	<section class="container-cart ">
		<div class="container container-web-page">
			<h3 class="font-weight-bold poppins-regular text-uppercase">Carrito de compras</h3>
			<hr>
		</div>

		<div class="container" style="padding-top: 40px;">

			<div class="row">
				<!-- calculamos el total de los productos en carrito -->
				<?php $total=0; ?>
				<!-- foreach para consultar los datos del array y colocar los datos de productos -->
				<?php foreach($_SESSION['CarritoCompras'] as $indice=>$producto){ ?>
				<div class="col-12 col-md-7 col-lg-8">
					<div class="container-fluid">

						<h5 class="poppins-regular font-weight-bold full-box text-center"><?php echo $producto['DESCRIPCION']; ?>
						</h5>
						<div class="bag-item full-box">
							<figure class="full-box">
								<img src="assets/img/descarga.png" class="img-fluid" alt="platillo_nombre">
							</figure>
							<div class="full-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12 col-lg-6 text-center mb-4">
											<div class="row justify-content-center">
												<div class="col-auto">
													<div class="form-outline mb-4">
														<input type="text" value="<?php echo $producto['CANTIDAD']; ?>" class="form-control text-center" id="product_cant_1" pattern="[0-9]{1,10}" maxlength="10" style="max-width: 100px; " disabled>
														<label for="product_cant_1" class="form-label">Cantidad</label>
													</div>
												</div>
												<div class="col-12 col-lg-4 text-center mb-4">
											<span class="poppins-regular font-weight-bold">PRECIO:$<?php echo $producto['PRECIO'];?></span>
										</div>
											</div>
										</div>
										<br>
										<div class="col-12 col-lg-4 text-center mb-4">
											<span class="poppins-regular font-weight-bold">SUBTOTAL: $<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></span>
										</div>
										<div class="col-12 col-lg-2 text-center text-lg-end mb-4">
											<!-- formulario con metodo post para eliminar productos del carrito -->
											<form action="" method="post">
											<input type="hidden" name="ID" id="ID" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);  ?>">
												<button type="submit" class="btn btn-danger" data-mdb-toggle="tooltip" 
												data-mdb-placement="bottom" title="Quitar del carrito"
												name="btnAccion" value="Eliminar">
												<span aria-hidden="true"><i class="far fa-trash-alt"></i></span>
												</button>
<!-- 												
												<button type="submit" class="btn btn-success" data-mdb-toggle="tooltip" 
												data-mdb-placement="bottom" title="Actualizar cantidad"
												name="btnAccion" value="Modificar">
												<i class="fas fa-sync-alt fa-fw"></i></button> -->
											</form>
											<!-- termina formulario con metodo post -->
										</div>
										
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
				<?php }?>
				<?php
			function llamar(){
				if (isset($_SESSION['s_correo'])) {
					echo '<script>window.location.href("pagar.php"); </script>';
				} else {
					echo '<script>alert("Debes iniciar sesion para realizar tu compra"); </script>';
				}
			}
			?>
				<div class="col-12 col-md-5 col-lg-4">
					<div class="full-box div-bordered">
						<h5 class="text-center text-uppercase bg-success" style="color: #FFF; padding: 10px 0;">Resumen del pedido</h5>
						<ul class="list-group bag-details">
							<a class="list-group-item d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #E1E1E1;"></a>
							<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
								Total
								<span>$<?php echo number_format($total, 2); ?></span>
							</a>
						</ul>
						<p class="text-center">
							<form action="pagar.php" method="post" class="text-center">
							<button type="submit"
							name="btnAccion"
							class="btn btn-primary">Confirmar pedido
							</button>
							</form>
						</p>
					</div>
				</div>
			</div>
			<br>
			
			<!-- comienza seccion de tabla -->
		<!-- creamos el apartado para ingresar el correo y enviar los datos del producto -->
		<!-- <tr>
			<td>
			<form action="pagar.php" method="post">
				<div class="alert alert-success" role="alert">
				<div class="form-group">
					<label for="my-input">Correo de contacto</label>
					<input id="email" class="form-control" type="email" name="email" placeholder="Escribe tu correo" required>
				</div>
				<small id="emailhelp" class="form-text text-muted">
					la informacion se enviara a ese correo
				</small>
				</div>
				<button class="btn btn-primary btn-lg btn-block" 
				type="submit" 
				name="btnAccion" 
				value="proceder">Proceder pago >></button>
				</form>
			</td>
		</tr> -->
		<!-- terminas eccion de tabla -->
		</div>
		
	</section>
	<?php }else{ ?>
		<br>
		<br>
		<div class="container">
		<p class="text-center" ><i class="fas fa-shopping-bag fa-5x"></i></p>
		<h4 class="text-center poppins-regular font-weight-bold" >Carrito de compras vacío</h4>
		</div>
		<?php } ?>
		
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
							<a href="https://www.facebook.com/profile.php?id=100046434374386" class="footer-link" target="_blank">
								<i class="fab fa-facebook fa-fw"></i> Facebook
							</a>
						</li>

						<li>
							<a href="https://instagram.com/jazmin_creperia_ymas?igshid=YmMyMTA2M2Y=" class="footer-link" target="_blank">
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
</body>

</html>