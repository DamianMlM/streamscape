<?php
  include_once "../php/proteccion.php";
  if ($_SESSION["tipo_usuario"]!='Administrador' ) 
  {
     //Redireccionamos a la página de firma de usuarios (LOGIN)
     header("Location: menu_principal_general.php");
     exit;
  }
  require_once "../php/bd.php";
  // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$id_user = $_GET["id_usuario"];
	
	$id_user = (int)$id_user;
	
	// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	// Cuando el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
    $sql = 'SELECT *  FROM usuarios WHERE id_usuario ='.$id_user;
	
	// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
    // El resultado se mostrará en la página, en el BODY del HTML **********************************************
    if (empty($rows)) {
        $result = "No se encontraron usuarios con esa información !!";
		header("Location: reporte_general_usuarios.php");
		exit;
    }

    // foreach ($rows as $row) {
    // //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
    // $contrasena_encriptada = $row['clave'];
    // }

    // function desencriptar_contrasena($contrasena_encriptada) {
    //     // No es posible desencriptar una contraseña en PHP porque utiliza una función de hash irreversible.
    //     // Sin embargo, puedes verificar si una contraseña coincide con su versión encriptada utilizando la función password_verify().
    //     // En este caso, simplemente devolvemos la contraseña encriptada sin desencriptarla.
    //     return $contrasena_encriptada;
    // }
    
    // // Obtén la contraseña desencriptada
    // $contrasena_desencriptada = desencriptar_contrasena($contrasena_encriptada);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamscape</title>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="icon" href="../imagenes/streamscape_icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../javascript/valida_alta_usuario.js"> </script>
        

</head>
<body>
    <main>
    <?php
         require_once "../includes/nav-banner.php";
    ?>



    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Registra una plataforma</h2>
        </div>
        
        <div class="container-intro-info">
             <form action="actualizar_user.php" method="post" id="formulario_plataforma"  onsubmit="return validaFormUsuario()"  >
                <div>
                <?php
                    foreach ($rows as $row) {
                    //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
                ?>
                    <label for="txt_id_usuario"> Id usuario: </label>
                    <input type="text" name="txt_id_usuario" id="txt_id_usuario" size="10" disabled
					 value="<?php echo $row['id_usuario']; ?>" />
					
                        <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->					
					<input type="hidden"  name="txt_id_usuario_oculto"  id="txt_id_usuario_oculto" size="10" 
					value="<?php echo $row['id_usuario']; ?>" />
					

                    <label for="name_user">Usuario:</label>
                    <input type="text" name="name_user" id="name_user" size="40" maxlength="50"
                    value="<?php echo $row['usuario']; ?>" />

                    <label for="correo_user"> Correo:</label>
                    <input type="text" name="correo_user" id="correo_user" size="45" maxlength="100"
                    value="<?php echo $row['correo']; ?>" />   
                    
                    <label for="clave_user"> Contraseña: </label>
                    <input type="password" name="clave_user" id="clave_user" size="15" maxlength="50"/>
                    <!-- An element to toggle between password visibility -->
                    <label for="showpass"> Mostrar contraseña: </label>
                    <input type="checkbox" id="showpass" onclick="myFunction()"><br>

                    <label for="repeat"><b>Repetir contraseña</b></label>
                    <input type="password" placeholder="Repeat Password" name="repeat" id="repeat" >

                    <label for="showpass1"> Mostrar contraseña: </label>
                    <input type="checkbox" id="showpass1" onclick="myFunction1()"><br>
            




                    <label for="tipo_user"> Tipo de usuario:</label>
                    <select name="tipo_user" id="tipo_user">
                        <option value="0">Selecciona el tipo de usuario</option>
                        <option value="1"<?php if ($row['tipousuario'] == 'Administrador') { echo ' selected'; } ?>>Administrador</option>
                        <option value="2"<?php if ($row['tipousuario'] == 'General') { echo ' selected'; } ?>>General</option>  
                        </select> 
                       
                    <?php } ?>
                    
                    <div class="container-button">
                        <input type="submit" class="botton-login" name="buscarSeries" value="Actualizar usuario " />
                        <a href="reporte_general_usuarios.php"><input type="button" class="botton-login" name="update_user" value="Cancelar Actualización " /></a>

                    </div>	
                    
                </div>
                
            </form>
            <!-- <div class="container-button">
            <a href="reporte_general_plataforma.php"><input type="button" class="botton-login" name="update_plataformas" value="Cancelar Actualización " /></a>
            </div>	 -->
        </div>

        
    </section>

    <?php
         require_once "../includes/pie.php";
    ?>
</body>
    <?php
         include_once "../includes/container-menu.php";
    ?>                      
</html>