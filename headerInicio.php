<!-- header -->
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="assets/img/JazminCafe.png" alt="Bootstrap" width="100" height="60">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 link-secondary">JazminCafe</a></li>
                <li><a href="menu.php?valor=0" class="nav-link px-2 link-dark">Menú</a></li>
                <li><a href="nosotros.php" class="nav-link px-2 link-dark">Acerca</a></li>
            </ul>

            <!-- carrito -->
            <a href="bag.php" class="header-button full-box text-center" title="Carrito">
                <i class="fas fa-shopping-bag"></i>
                <span class="badge bg-primary rounded-pill bag-count">
                    <?php 
                    echo (empty($_SESSION['CarritoCompras']))?0:count($_SESSION['CarritoCompras']);
                    ?>
                </span>
            </a>

            <!-- buscar -->
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search">
            </form> -->

            <!-- apartado de perfil lista desplegable -->
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="#" alt="mdo" width="32" height="32" class="rounded-circle">
                    
                    <small><?php echo $_SESSION["s_correo"]; ?></small>
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="PHP/EditarPerfil.php">Editar perfil</a></li>
                    <!-- <li><a class="dropdown-item" href="#">Registrarte</a></li> -->
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="PHP/logout.php">Cerrar secion</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>