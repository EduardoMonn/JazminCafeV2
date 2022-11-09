<?php
require "PHP/conexionPerfil.php";

$correo = $_SESSION['s_correo'];
$sql = $mysqli->query("SELECT usuario,correo FROM Usuarios WHERE correo = '$correo'");
$row = $sql->fetch_array();
    $email_to = $correo;
    $email_subject = "Informacion de pedido";
    $email_from = "JazCafe@gmail.com";

    $email_message = 'Hola ' . $row['usuario'] . " has realizado una compra\n\n";
    // $email_message .= "https://projectplayon.000webhostapp.com/PHP/NuevaPassword.php?usuario=".$row['usuario']."&token=".$token."\n\n";

    // Ahora se envía el e-mail usando la función mail() de PHP
    $headers = 'From: ' . $email_from . "\r\n" .
        'Reply-To: ' . $email_from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo '<script>
    swal("Acceso valido", "Te hemos enviado un email con informacion de tu pedido", "success")
    .then((value) => {
        window.location.href = "Recuperacion.php";
    });
    </script>';

?>