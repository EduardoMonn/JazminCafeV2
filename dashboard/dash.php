<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1></h1>
</div>
<div class="centrado text-center">
    <h1>Bienvenido Usuario <span class="badge badge-primary">
            <?php echo $_SESSION["s_usuario"]; ?>
    </h1> </span>
    <img src="IMG/logo.png" alt="" height="">
</div>
<div class="centrado text-justify">
    <p style="margin: 0 80px; padding: 2rem;">
        ¡El navegador se esta volviendo más poderoso que nunca!
        ¡Los desarrolladores están creado juegos exquisitos y nuestra misión no es diferente!
        Todo los dias nuestro equipo <span>"PlayON"</span> trabaja ára crear las mejores condiciones para
        que los jugadores descubran las nuevas formas de jugar en el navegador.<br>
        <span>"PlayON"</span> es una pagina dedicada especificamente a videojuegos en la web
        de esta manera los usuarios podran entretenerce sin necesidad de instalar los juegos
        en su computador.
    </p>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>