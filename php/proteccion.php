<?php
   //Inicializamos el uso de las sesiones ***********************
	session_start();
	//Verificamos que la variable de SESION tenga datos validos
	//Si los trae, dejamos visualizar esta página, de lo contrario
	//lo regresamos a la página de firma de usuarios (LOGIN)
	if ($_SESSION["validado"]!="true") 
	{
	   //Redireccionamos a la página de firma de usuarios (LOGIN)
       header("Location: ../index.php");
	   exit;
    }
	// if ($_SESSION["tipo_usuario"]=2 ) 
	// {
	//    //Redireccionamos a la página de firma de usuarios (LOGIN)
    //    header("Location: ../index.php");
	//    exit;
    // }
?>