<?php

session_start();

include_once 'ConexionDB.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//*recepcion de las datos enviados mediante el metodo post desde ajax
$correo = (isset($_POST['correo'])) ? $_POST['correo'] :'';
$password = (isset($_POST['password'])) ? $_POST['password'] :'';

$pass = md5($password); //*encriptacion de la clave enviada por el usuario para compararla con la clave en la DB

$consulta = "SELECT Usuarios.IdUsuario, Usuarios.Rol_Id, Roles.rol AS rol FROM Usuarios JOIN Roles ON Roles.Id=Usuarios.Rol_Id WHERE correo = '$correo' AND password='$pass'";

    try{
        $resultado = $conexion -> prepare($consulta);
        $resultado->execute();
        
        if(isset($_COOKIE["block".$correo])){
            $_SESSION ["s_correo"] = null;
            $data= 1;
        }else{ 
            if ($resultado->rowCount() >= 1) {
                $data = $resultado -> fetchAll(PDO::FETCH_ASSOC);
                $_SESSION ["s_correo"] = $correo;
                $_SESSION ["s_usuario"] = $data[0]["usuario"];
                $_SESSION ["s_Rol_Id"] = $data[0]["Rol_Id"];
                $_SESSION ["s_rol"] = $data[0]["rol"];
                $_SESSION ["s_IdUsuario"] = $data[0]["IdUsuario"];
            }else {
                $_SESSION ["s_correo"] = null;
                $data=null;
                if(isset($_COOKIE["$correo"])){
                    $contador = $_COOKIE["$correo"];
                    $contador++;
                    setcookie($correo,$contador,time()+ 120); 
                    if($contador>=3){
                        setcookie("block".$correo,$contador,time()+60);
                    }
                }else{
                    setcookie($correo,1,time()+120);
                }
            }
        }
    }catch(Exception $ex){
        echo $ex;
    }
    print json_encode($data);
    $conexion=null;
?>