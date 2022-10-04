<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$DsProducto = (isset($_POST['DsProducto'])) ? $_POST['DsProducto'] : '';
$Contenido = (isset($_POST['Contenido'])) ? $_POST['Contenido'] : '';
$CvProveedor = (isset($_POST['CvProveedor'])) ? $_POST['CvProveedor'] : '';
$CvCategoria = (isset($_POST['CvCategoria'])) ? $_POST['CvCategoria'] : '';
$Precio = (isset($_POST['Precio'])) ? $_POST['Precio'] : '';
$Stock = (isset($_POST['Stock'])) ? $_POST['Stock'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$CvProducto = (isset($_POST['CvProducto'])) ? $_POST['CvProducto'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO Productos (DsProducto, Contenido, CvProveedor, CvCategoria, Precio, Stock) VALUES('$DsProducto', '$Contenido', ','$CvProveedor','$CvCategoria') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT CvProducto, DsProducto, Contenido, CvProveedor, CvCategoria, Precio, Stock FROM Productos ORDER BY CvProducto DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE Productos SET DsProducto='$DsProducto', Contenido='$Contenido', CvProveedor='$CvProveedor', CvCategoria='$CvCategoria', Precio='$Precio', Stock='$Stock' WHERE CvProducto='$CvProducto' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT CvProducto, DsProducto, Contenido, CvProveedor, CvCategoria, Precio, Stock FROM Productos WHERE CvProducto='$CvProducto' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM Productos WHERE CvProducto='$CvProducto' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                         
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
