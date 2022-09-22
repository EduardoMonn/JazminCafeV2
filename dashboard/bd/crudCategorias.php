<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$DsCategoria = (isset($_POST['DsCategoria'])) ? $_POST['DsCategoria'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$CvCategoria = (isset($_POST['CvCategoria'])) ? $_POST['CvCategoria'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO Categorias (DsCategoria) VALUES('$DsCategoria') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT CvCategoria, DsCategoria FROM Categorias ORDER BY CvCategoria DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE Categorias SET DsCategoria='$DsCategoria' WHERE CvCategoria='$CvCategoria' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT CvCategoria, DsCategoria FROM Categorias WHERE CvCategoria='$CvCategoria' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM Categorias WHERE CvCategoria='$CvCategoria' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                         
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
