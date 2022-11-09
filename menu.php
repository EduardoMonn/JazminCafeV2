<?PHP
include 'PHP/ConexionDB.php';
include 'PHP/carrito.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
if (isset($_SESSION['s_correo'])) {
    require_once 'headerInicio.php';
} else {
    require_once 'header.php';
}
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>ptm</title>

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
	<!-- Content -->
	<div class="container container-web-page">
		<h1 class="text-center">"Bienvenido al menú".</h1>
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
					$consulta_mysql = $con->query("SELECT * FROM Categorias");
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
        $consulta_mysql = $con->query("SELECT * FROM Categorias WHERE CvCategoria LIKE '%$v2%'");
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
                        <a href="">
                            <div class="product">
                                <img src="assets/img/descarga.png" alt="">
                                <div class="detail-title"><?= $res['DsProducto'] ?></div>
                                <div class="detail-description">Contenido: <?= $res['Contenido'] ?>gr</div>
                                <div class="detail-price">Precio: $<?= $res['Precio'] ?><span>.00</span></div>
                                <div class="text-center card-product-options" style="padding: 10px 0;">
                                    <!-- coemizno del form -->
                                    <!-- agregamos productos al carrito -->
                                    <form action="" method="post">
                                        <!-- < ?php session_destroy() ?> -->
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded text-success" name="btnAccion" value="Agregar">
                                            <i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                                        &nbsp; &nbsp;
                                        <a></a> <div class="btn btn-link btn-sm btn-rounded">Cantidad: <input type="number" value="1" id="fecha" min="1" 
                                        max="<?php echo $res['Stock'];?>" style="width: 40px;"></div>
                                        &nbsp; &nbsp;
                                        
                                        <!-- <input type="number" name="" id="" value="" min="1" max="8"> -->
                                        
                                        
                                        <input type="hidden" name="CvProducto" id="CvProducto" value="<?php echo openssl_encrypt($res['CvProducto'], COD, KEY);  ?>">
                                        <input type="hidden" name="DsProducto" id="DsProducto" value="<?php echo openssl_encrypt($res['DsProducto'], COD, KEY); ?>">
                                        <input type="hidden" name="Precio" id="Precio" value="<?php echo openssl_encrypt($res['Precio'], COD, KEY); ?>">
                                        <input type="hidden" name="Cantidad" id="Cantidad" value="1">
                                    </form>
                                    
                                    <!-- Cierre del form -->
                                    
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
                        <a href="">
                            <div class="product">
                                <img src="assets/img/descarga.png" alt="">
                                <div class="detail-title"><?= $res['DsProducto'] ?></div>
                                <div class="detail-description">Contenido: <?= $res['Contenido'] ?>gr</div>
                                <div class="detail-price">Precio: $<?= $res['Precio'] ?><span>.00</span></div>
                                <div class="text-center card-product-options" style="padding: 10px 0;">
                                    <!-- coemizno del form -->
                                    <!-- agregamos productos al carrito -->
                                    <form action="" method="post">
                                        <!-- < ?php session_destroy() ?> -->
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded text-success" name="btnAccion" value="Agregar">
                                            <i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                                        &nbsp; &nbsp;
                                        <a></a> <div class="btn btn-link btn-sm btn-rounded">Cantidad: <input type="number" value="1" id="fecha" min="1" 
                                        max="<?php echo $res['Stock'];?>" style="width: 40px;"></div>
                                        &nbsp; &nbsp;
                                        
                                        <!-- <input type="number" name="" id="" value="" min="1" max="8"> -->
                                        
                                        
                                        <input type="hidden" name="CvProducto" id="CvProducto" value="<?php echo openssl_encrypt($res['CvProducto'], COD, KEY);  ?>">
                                        <input type="hidden" name="DsProducto" id="DsProducto" value="<?php echo openssl_encrypt($res['DsProducto'], COD, KEY); ?>">
                                        <input type="hidden" name="Precio" id="Precio" value="<?php echo openssl_encrypt($res['Precio'], COD, KEY); ?>">
                                        <input type="hidden" name="Cantidad" id="Cantidad" value="1">
                                    </form>
                                    
                                    <!-- Cierre del form -->
                                    
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

<script>
    var fecha= document.getElementById('fecha');
    fecha.addEventListener('change', setText);
    function setText() {
        var texto = document.getElementById('Cantidad');
        texto.value = fecha.value;
	}
</script>
	<!-- MDBootstrap V5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./js/mdb.min.js"></script>
	<!-- General scripts -->
	<script src="./js/main.js"></script>
</body>

</html>