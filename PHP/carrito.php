<?php
//iniciamos la sesion
session_start();
// Definimos constantes para encriptar los datos que se enviaran al carrito -->
define("KEY", "Lapulga123");
define("COD", "AES-128-ECB");
$mensaje="";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['CvProducto'], COD, KEY))) {
                $ID=openssl_decrypt($_POST['CvProducto'], COD, KEY);
                $mensaje="Ok Id correcto ".$ID."<br>";
            }else{
                $mensaje="Uppss Id incorrecto"."<br>";
            }
            if (is_string(openssl_decrypt($_POST['DsProducto'], COD, KEY))) {
                $DESCRIPCION=openssl_decrypt($_POST['DsProducto'], COD, KEY);
                $mensaje.="Descripcion correcto "."<br>";
            }else{
                $mensaje.="Uppss Descripcion incorrecta"."<br>"; break;
            }
            if (is_numeric(openssl_decrypt($_POST['Precio'], COD, KEY))) {
                $PRECIO=openssl_decrypt($_POST['Precio'], COD, KEY);
                $mensaje.="Precio correcto "."<br>";
            }else{
                $mensaje.="Uppss Precio incorrecta"."<br>"; break;
            }
            if ($_POST['Cantidad']) {
                $CANTIDAD=$_POST['Cantidad'];
                $mensaje.="Cantidad correcto "."<br>";
            }else{
                $mensaje.="Uppss Cantidad incorrecta"."<br>"; break;
            }
            if (!isset($_SESSION['CarritoCompras'])) {
                $producto = array(
                    'ID'=>$ID,
                    'DESCRIPCION'=>$DESCRIPCION,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                // contar  el carrito de compras cuando agregamos mas productos
                $_SESSION['CarritoCompras'][0]=$producto;
            }else{
                $idProductos= array_column($_SESSION['CarritoCompras'],"ID");
                // validamos que no se repita el mismo producto.
                if (in_array($ID,$idProductos)) {
                    echo '<script> alert("EL producto ya se encuentra en el carrito"); </script>';
                
                }else{
                $NumeroProductos=count($_SESSION['CarritoCompras']);
                $producto = array(
                    'ID'=>$ID,
                    'DESCRIPCION'=>$DESCRIPCION,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                // contar  el carrito de compras cuando agregamos mas productos
                $_SESSION['CarritoCompras'][$NumeroProductos]=$producto;
                
                // no funciona esta vaina ptm
                // unset($producto[0],$producto[1],$producto[2],$producto[3],$producto[4],$producto[5],$producto[6],$producto[7],$producto[8],$producto[9]);
            }
        }
            // imprime lo que contiene nuestro arreglo
            // echo print_r($_SESSION,true);
        break;
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['ID'], COD, KEY))) {
                $ID=openssl_decrypt($_POST['ID'], COD, KEY);
                
                foreach ($_SESSION['CarritoCompras'] as $indice=>$producto) {
                    if ($producto['ID']==$ID) {
                        unset($_SESSION['CarritoCompras'][$indice]);
                        $_SESSION['CarritoCompras']=array_values($_SESSION["CarritoCompras"]); 
                        // echo '<script> alert("Elemento borrado..."); </script>';
                    }
                }
            }else{
                $mensaje="Uppss Id incorrecto"."<br>";
            }
        break;
    }
}

?>