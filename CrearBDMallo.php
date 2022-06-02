<?php
	//Estableciendo conexioncon el motor de BD
		$Conectado=mysqli_connect("localhost","root","");
		
		//Creando la consulta para crear una BD si es que no existe
		$Consulta="CREATE DATABASE IF NOT EXISTS grupomallo;";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Seleccionamos la BD recien creada
		//mysql_select_db("BD_alumno", $Conectado);
		mysqli_select_db($Conectado, "grupomallo");
		
		//Si la tabla existe se elimina de la BD
		$Consulta="DROP TABLE IF EXISTS producto;";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Creamos la estructura de la tabla
		$Consulta="CREATE TABLE producto (IDPRODUCTO int(11) NOT NULL, IDPROVEEDOR int(11) DEFAULT NULL, NOMBRE_PROD varchar(50) DEFAULT NULL, DESCRIPCION varchar(200) DEFAULT NULL, CANTIDAD int(11) DEFAULT NULL, TIPO varchar(15) DEFAULT NULL,FECHA_RECIBIDO date DEFAULT NULL,FECHA_EXPIRACION date DEFAULT NULL);";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Si la tabla existe se elimina de la BD
		$Consulta="DROP TABLE IF EXISTS proveedor;";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Creamos la estructura de la tabla
		$Consulta="CREATE TABLE proveedor (IDPROVEEDOR int(11) NOT NULL, NOMBRE varchar(30) DEFAULT NULL, APELLIDO varchar(30) DEFAULT NULL, DIRECCION varchar(100) DEFAULT NULL, TELEFONO varchar(9) DEFAULT NULL, DESCRIPCION varchar(70) DEFAULT NULL);";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Si la tabla existe se elimina de la BD
		$Consulta="DROP TABLE IF EXISTS usuario;";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//Creamos la estructura de la tabla
		$Consulta="CREATE TABLE usuario (IDUSUARIO int(11) NOT NULL, NOMBRE varchar(15) DEFAULT NULL,PASS_USUARIO varchar(10) DEFAULT NULL, NIVEL int NOT NULL);";
		//$EjecutarConsulta=mysql_query($Consulta, $Conectado);
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		
		//Creando PK
		$Consulta="ALTER TABLE producto
		ADD PRIMARY KEY (IDPRODUCTO);";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		$Consulta="ALTER TABLE proveedor
		ADD PRIMARY KEY (IDPROVEEDOR);";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		//AUTO_INCREMENT de las tablas
		/*$Consulta="ALTER TABLE producto
		MODIFY IDPRODUCTO int AUTO_INCREMENT;";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		$Consulta="ALTER TABLE proveedor
		MODIFY IDPROVEEDOR int AUTO_INCREMENT;";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		$Consulta="ALTER TABLE usuario
		MODIFY IDUSUARIO int AUTO_INCREMENT;";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);*/
		
		//Creando FK
		$Consulta="ALTER TABLE producto
		ADD CONSTRAINT PRODUCTOPROVEE FOREIGN KEY (IDPROVEEDOR) 
		REFERENCES proveedor (IDPROVEEDOR);";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
		$Consulta="INSERT INTO usuario(IDUSUARIO,NOMBRE,PASS_USUARIO,NIVEL) VALUES ('1','Hector','123456','2');";
		$EjecutarConsulta=mysqli_query($Conectado, $Consulta);
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
 
		//Verificando si la BD se creo.
		if($EjecutarConsulta)
		{
			echo ("La BD y las tablas fueron creados de forma satisfactoria.<br>");
		}
		else
		{
			echo("Surgio problema para crear la BD.<br>");
			echo("El problema es: <br>");
			//echo("Codigo de error: <b>".mysql_errno()."</b><br>");
			echo("Codigo de error: <b>".mysqli_errno($Conectado)."</b><br>");
		}
		
		//liberando recursos y cerrando la BD;
		//@mysql_free_result($EjecutarConsulta);
		@mysqli_free_result($EjecutarConsulta);
		//mysql_close($Conectado);
		mysqli_close($Conectado);
?>