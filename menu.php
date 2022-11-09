<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

	<!--+ eslitos css -->
	<!-- footer -->
	<link rel="stylesheet" href="css/estiloFooter.css">
	<!-- productos -->
	<link rel="stylesheet" href="css/estiloProductos.css">
	<!-- slider -->
	<link rel="stylesheet" href="css/estiloSlider.css">
	<!-- barra -->
	<link rel="stylesheet" href="css/estiloBarra.css">

</head>

<body>
	<!-- header -->
    <?PHP
    include_once 'header.php';
    ?>

	<!-- Content -->
	<div class="container container-web-page">
		<h1 class="text-justify">Bienvenido al menú".</h1>
		<div class="select">
			<!-- combobox para mostrar las opciones -->
			<form action="">
				<select name="categorias" id="format" onchange="enviar_valores(this.value);">
					<option value="0" selected>Seleccione:</option>
					<!-- Creamos conexcion ya que no se por que no medeja usar la "_conexion.php" -->
					<?PHP
					// conexion a la base de datos
					$con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');
					// return $mysqli;
					// Consulta sql seleccionamos todo de la tabla "categorias"
					$consulta_mysql = $con->query("SELECT * FROM categorias");
					// Mostraremos los datos con el ciclo while por que asi lo aprendi
					while ($cat = mysqli_fetch_assoc($consulta_mysql)) {
					?>
						<!-- <option value="0">Seleccione:</option> -->
						<option value="<?= $cat['CvCategoria'] ?>"><?= $cat['DsCategoria'] ?></option>
					<?PHP } ?>
				</select>
			</form>
			<!-- script para enviar la respuesta -->
			<script>
				function enviar_valores(valor) {
					//Pasa los parámetros a la pagina buscar
					location.href = '?valor=' + valor;
				}
			</script>

		<!-- mostramos de que clase pedimos  -->
		</div>
		<!-- consultaremos que categoria se visualiza -->
		<?PHP
        // conexion a la base de datos
        $con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');
        // return el metodo post pendejo get
        $v2 = $_GET['valor'];
        // Consulta sql seleccionamos todo de la tabla "categorias"
        $consulta_mysql = $con->query("SELECT * FROM categorias WHERE CvCategoria LIKE '%$v2%'");
        // Mostramos datos con el wile
        while ($cate = mysqli_fetch_assoc($consulta_mysql)) {
        ?>
		<p class="font-weight-bold poppins-regular text-uppercase">Productos de tipo <?= $cate['DsCategoria'] ?></p>
		<?php } ?>
		
	</div>

	<!-- productos -->
	<?PHP
	$v3 = $_GET['valor'];
	if ($v3 == 0) {
	?>
		<!-- ! productos general -->
		<div class="mai-content">
			<div class="content-page">
				<div class="title-section"></div>
				<div class="products-list" id="space-list">
					<!-- Consulta sql -->
					<?PHP
					// conexion a la base de datos a huevo ya me la aprendi
					$con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');

					// consulta a la table a huvo ya meros me la aprendo
					$consu = $con->query("SELECT * FROM Productos WHERE Stock > 0");

					// Mostramos los datos mediante un ciclo por mis huvos
					//se repetira la cantidad de productos
					while ($res = mysqli_fetch_assoc($consu)) {
					?>
						<div class="products-box">
							<a href="details.php?clave=<?= $res['CvProducto'] ?>">
								<div class="product">
									<img src="assets/img/descarga.png" alt="">
									<div class="detail-title"><?= $res['DsProducto'] ?></div>
									<div class="detail-description"><?= $res['Contenido'] ?></div>
									<div class="detail-price"><?= $res['Precio'] ?><span>00</span></div>

									<div class="text-center card-product-options" style="padding: 10px 0;">
                                    <button type="button" class="btn btn-link btn-sm btn-rounded text-success"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                                    &nbsp; &nbsp;
                                    <a href="details.php" class="btn btn-link btn-sm btn-rounded"><i class="fas fa-box-open fa-fw"></i> &nbsp; Detalles</a>
                                    &nbsp; &nbsp;
                                </div>

								</div>
							</a>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>


	<?php } else {
	?>
		<!--! productos por categoria -->
		<div class="mai-content">
			<div class="content-page">
				<div class="title-section"></div>
				<div class="products-list" id="space-list">

					<!-- Consulta sql -->
					<?PHP
					// conexion a la base de datos a huevo ya me la aprendi
					$con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');

					// Si todo funciona como creo esto guardara la posicion del selec para
					//utilizarlo en la sentencia
					$v1 = $_GET['valor'];
					// consulta a la table a huvo ya meros me la aprendo
					$consu = $con->query("SELECT * FROM Productos WHERE CvCategoria LIKE '%$v1%' AND Stock > 0");

					// Mostramos los datos mediante un ciclo por mis huvos
					//se repetira la cantidad de productos
					while ($res = mysqli_fetch_assoc($consu)) {
					?>
						<div class="products-box">
							<a href="details.php?clave=<?= $res['CvProducto'] ?>">
								<div class="product">
									<img src="assets/img/descarga.png" alt="">
									<div class="detail-title"><?= $res['DsProducto'] ?></div>
									<div class="detail-description"><?= $res['Contenido'] ?></div>
									<div class="detail-price"><?= $res['Precio'] ?><span>00</span></div>

									<div class="text-center card-product-options" style="padding: 10px 0;">
                                    <button type="button" class="btn btn-link btn-sm btn-rounded text-success"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                                    &nbsp; &nbsp;
                                    <a href="details.php" class="btn btn-link btn-sm btn-rounded"><i class="fas fa-box-open fa-fw"></i> &nbsp; Detalles</a>
                                    &nbsp; &nbsp;
								</div>

								</div>
							</a>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	<?php } ?>

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