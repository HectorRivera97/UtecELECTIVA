<?php 
$nombre=$_POST["nombre"];
//$correo=$_POST["correo"];
$contra=$_POST["contra"];
include  'conexion.php';
$sql="insert into usuario(NOMBRE,PASS_USUARIO,TipoUsuario) values('$nombre','$contra',0);";
$mysqli->query($sql);
?>
<html>
    <head></head>
    <body>
        Tu cuenta se cre&oacute; con exito<br>
        <a href="Login.html">Volver</a>
    </body>
</html>