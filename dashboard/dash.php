<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1></h1>
</div>
<div class="centrado text-center">
    <h1>Bienvenido <span class="badge badge-primary">
            <?php echo $_SESSION["s_usuario"]; ?>
    </h1> </span>
    <img src="../assets/img/jazminCafeLogo.jpeg" alt="" height="">
</div>
<div class="centrado text-justify">
    <p style="margin: 0 80px; padding: 2rem;">
        jazmin
    </p>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>