<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$empresa = (isset($_POST['empresa'])) ? $_POST['empresa'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$CvProveedor = (isset($_POST['CvProveedor'])) ? $_POST['CvProveedor'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO Proveedores (nombre,empresa,telefono) VALUES('$nombre','$empresa','$telefono') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT CvProveedor, nombre, empresa, telefono FROM Proveedores ORDER BY CvProveedor DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE Proveedores SET nombre='$nombre', empresa='$empresa', telefono='$telefono' WHERE CvProveedor='$CvProveedor' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT CvProveedor, nombre, empresa, telefono FROM Proveedores WHERE CvProveedor='$CvProveedor' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM Proveedores WHERE CvProveedor='$CvProveedor' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                         
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
