<?php

session_start();

include_once 'ConexionDB.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//*recepcion de las datos enviados mediante el metodo post desde ajax
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] :'';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] :'';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] :'';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] :'';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] :'';
$password = (isset($_POST['password'])) ? $_POST['password'] :'';

$pass = md5($password); //*encriptacion de la clave enviada por el usuario para compararla con la clave en la DB

$verificar = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resul = $conexion->prepare($verificar);
$resul->execute();

if ($resul->rowCount()==0) {
    $consulta = "INSERT INTO usuarios(nombre,apellido,telefono,correo,usuario,password,token,Rol_Id) VALUES ('$nombre','$apellido','$telefono','$correo','$usuario','$pass','','2')";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo 1;
}else{
    echo 0;
}





/*if ($resultado->rowCount() >= 1) {
    $data = $resultado -> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION ["s_usuario"] = $usuario;

}else {
    $_SESSION ["s_usuario"] = null;
    $data=null;
}
print json_encode($data);
$conexion=null;*/
