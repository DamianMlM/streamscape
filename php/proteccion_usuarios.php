<?php
   //Inicializamos el uso de las sesiones ***********************
	session_start();
	//Verificamos que la variable de SESION tenga datos validos
	//Si los trae, dejamos visualizar esta página, de lo contrario
	//lo regresamos a la página de firma de usuarios (LOGIN)
	if(!isset($_SESSION["validado"]) || $_SESSION["validado"] !== "true")
	{
	   //Redireccionamos a la página de firma de usuarios (LOGIN)
       header("Location: ../index.php");
	   exit;
    }
	if ($_SESSION["tipo_usuario"]!='Administrador' ) 
	{
   //Redireccionamos a la página de firma de usuarios (LOGIN)
   header("Location: menu_principal_general.php");
   exit;
}
 ?>

	