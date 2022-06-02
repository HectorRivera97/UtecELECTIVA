<?PHP
// Iniciar sesión
   session_start();

// Si se ha enviado el formulario
  $usuario = $_REQUEST['usuario'];
  $clave = $_REQUEST['clave'];
  if (isset($usuario) && isset($clave))
  {
    // Comprobar que el usuario está autorizado a entrar
    include "Conexion.php";
	 
    $result = mysqli_query($conexion,"SELECT * FROM usuario WHERE NOMBRE='$usuario' and PASSS_USUARIO='$clave'");
$nfilas = mysqli_num_rows($result); 
    // Los datos introducidos son correctos
    if ($nfilas > 0)
    {
      $row = mysqli_fetch_row($result);
      $nivel = $row[3];
         
      $_SESSION["usuario_valido"] = $usuario;
      $_SESSION["nivel"]=$nivel;
        
      if ($nivel==1)
      {
	header("Location: RegistrarAdministrador.html");
	exit;
      }		 
      if ($nivel==2)
      {
        header("Location: RegistrarAdministrador.html");
        exit;
      }	
    }
    else
    {
      echo "
         <html>
	 <head>
	     <title>Acceso no Autorizado</title>
	 </head>
	 <body>
	      <P>Acceso no autorizado</P>
	      <P>[ <A HREF='Login.html'>Conectar</A> ]</P>
	 </body>
	 </html>";
    }
    include "Cerrar_Conexion.php";
 }
else
    {
      echo "
         <html>
	 <head>
	     <title>Acceso no Autorizado</title>
	 </head>
	 <body>
	      <P>Acceso no autorizado</P>
	      <P>[ <A HREF='Login.html'>Conectar</A> ]</P>
	 </body>
	 </html>";
    }	
?>
