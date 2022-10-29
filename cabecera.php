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
					<?PHP
					// conexion a la base de datos a huevo ya me la aprendi
					$con = mysqli_connect('localhost', 'root', '', 'jazmincafedb');
					// Si todo funciona como creo esto guardara la posicion del selec para
					// consulta a la table a huvo ya meros me la aprendo
					$consu = $con->query("SELECT * FROM categorias WHERE CvCategoria LIKE '1'");
					// Mostramos los datos mediante un ciclo por mis huvos
					//se repetira la cantidad de productos
					while ($res = mysqli_fetch_assoc($consu)) {
					?>
						<a href="Categorias.php?valor=<?= $res['CvCategoria'] ?>">Menú</a>
					<?php } ?>
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

		<!-- <div class="header-button full-box text-center" id="userMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Nombre de usuario">
				<i class="fas fa-user-circle"></i>
			</div>
			<div class="dropdown-menu div-bordered popup-login" aria-labelledby="userMenu">
				<p class="text-center" style="padding-top: 10px;">
					<i class="fas fa-user-circle fa-3x"></i><br>
					<small>Nombre de usuario</small>
				</p>

				<a class="dropdown-item" href="javascript:void(0);">
					<i class="fas fa-sign-out-alt"></i> &nbsp; Cerrar sesión
				</a>
			</div> -->

		<a href="javascript:void(0);" class="header-button full-box text-center d-lg-none" title="Menú" onclick="show_menu_mobile()">
			<i class="fas fa-bars"></i>
		</a>
	</div>
</header>