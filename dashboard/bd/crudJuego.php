<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
$instrucciones = (isset($_POST['instrucciones'])) ? $_POST['instrucciones'] : '';
$repositorio = (isset($_POST['repositorio'])) ? $_POST['repositorio'] : '';
$url_img = (isset($_POST['url_img'])) ? $_POST['url_img'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$IdJuego = (isset($_POST['IdJuego'])) ? $_POST['IdJuego'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO Juegos (nombre, genero, instrucciones, repositorio, url_img) VALUES('$nombre', '$genero', '$instrucciones','$repositorio','$url_img') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT IdJuego, nombre, genero, instrucciones, repositorio, url_img FROM Juegos ORDER BY IdJuego DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE Juegos SET nombre='$nombre', genero='$genero', instrucciones='$instrucciones', repositorio='$repositorio', url_img='$url_img' WHERE IdJuego='$IdJuego' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT IdJuego, nombre, genero, instrucciones, repositorio, url_img FROM Juegos WHERE IdJuego='$IdJuego' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM Juegos WHERE IdJuego='$IdJuego' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                         
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
