<?php

function datos_usuario($IdUsuario,$value) {

	require "ConexionDB.php";

	$IdUsuario = $mysqli->real_escape_string($IdUsuario);
	$value = $mysqli->real_escape_string($value);

	$datosZ = $mysqli->query("SELECT * FROM Usuarios WHERE IdUsuario = $IdUsuario");
	$rowZ = $datosZ->fetch_array();

	echo $rowZ[$value];

}

?>