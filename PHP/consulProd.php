<?php
include '_conexion.php';
//variable de respuesta
$response=new stdClass();

//areglo para guardar datos
$datos=[];
$i=0;
$sql="SELECT * FROM productos";
$result=mysqli_query($con,$sql);
//recorre todo los resultados de la consulta y los itera uno a uno
while ($row = mysqli_fetch_array($result)) {
    //creamos un objeto del mismo tipo que la respuesta
    $obj = new stdClass();
    //llenamos los capos del objeto con la de la base de datos
    $obj->CvProducto = $row['CvProducto'];
    $obj->DsProducto = $row['DsProducto'];
    $obj->contenido = $row['Contenido'];
    $obj->CvProveedor = $row['CvProveedor'];
    $obj->CvCategoria = $row['CvCategoria'];
    $obj->Precio = $row['Precio'];
    $obj->Stock = $row['Stock'];
    //para guardar el dato lo insertamos en el arreglo
    $datos[$i]=$obj;
    $i++;
}

//guardamos datos para enviarlos
$response->datos=$datos;

//cerramos la conexion
mysqli_close($con);
//agregamos un heder para que sepa que el resultado es de tipo json
header('Content-Type: application/json');
//mostramos la respuesta en formato json
echo json_encode($response);

