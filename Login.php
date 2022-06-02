<?php

//Creacion de base de datos
$cdb=@$_POST["CDB"];
if(isset($cdb)){
    $datos = file_get_contents('grupomallo.sql');
    $c=new mysqli("localhost","root","");
    $c->multi_query($datos);
?>
<html>
    <head><title>Exito</title></head>
    <body>
        Base de datos creada con exito!<br>
        <a href="Login.html">Volver</a>
    </body>
</html>
<?php   
    return;
}
//validacion de inicio administrador u otro perfil
$user=@$_POST["username"];
$pass=@$_POST["password"];
include 'conexion.php';
$sql="select * from usuario where nombre='$user' and PASS_USUARIO='$pass'";
if($resultado = $mysqli->query($sql)){
    if($resultado->num_rows === 0){

?>
<html>
    <head><title>Error</title></head>
    <body>
        El usuario o contrase&ntilde;a no existe!<br>
        <a href="Login.html">Volver</a>
    </body>
</html>
<?php
   
    }else{
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION["USUARIOID"]=$usuario["IDUSUARIO"];
            $_SESSION["TIPOUSUARIO"]=$usuario["TipoUsuario"];
            if($usuario["TipoUsuario"]==0){
                header('Location: usuario/IndexUser.html');
            }else{
                header('Location: administrador/AdminIndex.html');
            }
        }
}
?>