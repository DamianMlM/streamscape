<?php
  include_once "../php/proteccion.php";
  if ($_SESSION["tipo_usuario"]!='Administrador' ) 
  {
     //Redireccionamos a la página de firma de usuarios (LOGIN)
     header("Location: menu_principal_general.php");
     exit;
  }
  require_once "../php/bd.php";
  $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    $sql = 'SELECT * FROM usuarios';

    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
   $stmt = $conn->query($sql);
   // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
   $rows = $stmt->fetchAll();
   // Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
   if (empty($rows)) {
       $result = "No se encontraron resultados !!";
   }
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
            <h2 >Registra un nuevo usuario</h2>
        </div>
        
        <div class="container-intro-info">
             <form action="grabar_usuario.php" method="post" id="formulario_plataforma"  onsubmit="return validaFormUsuario()"  >
                <div>
                    <label for="name_user">Usuario:</label>
                    <input type="text" name="name_user" id="name_user" size="40" maxlength="50">

                    <label for="correo_user"> Correo:</label>
                    <input type="text" name="correo_user" id="correo_user" size="45" maxlength="100">   
                    
                    <label for="clave_user"> Contraseña: </label>
                    <input type="password" name="clave_user" id="clave_user" size="15" maxlength="50"> 
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
                        <option value="1">Administrador</option>
                        <option value="2">General</option>
                    </select> 


                    <div class="container-button">
                    <input type="submit" class="botton-login" name="buscarSeries" value="Registrar usuario " />
                    </div>	
                </div>
            </form>
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