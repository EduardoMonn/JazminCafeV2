<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$IdUsuario = (isset($_POST['IdUsuario'])) ? $_POST['IdUsuario'] : '';

$password = md5($password);
switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO Tusuarios (nombre, correo, usuario, password,Rol_Id) VALUES('$nombre', '$correo', '$usuario','$password','1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT IdUsuario, nombre, correo, usuario, password FROM Tusuarios ORDER BY IdUsuario DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE Tusuarios SET nombre='$nombre', correo='$correo', usuario='$usuario', password='$password' WHERE IdUsuario='$IdUsuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT IdUsuario, nombre, correo, usuario, password FROM Tusuarios WHERE IdUsuario='$IdUsuario' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM Tusuarios WHERE IdUsuario='$IdUsuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                         
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
