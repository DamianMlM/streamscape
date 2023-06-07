<?php
  include_once "../php/proteccion.php";
  if ($_SESSION["tipo_usuario"]!='Administrador' ) 
  {
     //Redireccionamos a la página de firma de usuarios (LOGIN)
     header("Location: menu_principal_general.php");
     exit;
  }
  //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
       
  require_once "../php/bd.php";
  $result;
  
  // Escribimos la consulta para recuperar los registros de la tabla de MySQL
  $sql = 'SELECT *  FROM usuarios WHERE id_usuario = id_usuario';

  // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
  $result = $conn->query($sql);
  
  // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
  $rows = $result->fetchAll();
  
  // Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
  // (Variable con varias valores)
  // y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
  // El resultado se mostrará en una tabla HTML ***************************************************
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
    
   
</head>
<body>
    <main>
       
    <?php
         require_once "../includes/nav-banner.php";
    ?>
    
    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Reporte de los usuarios</h2>
        </div>


        <div  style="overflow-x:auto;" >
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Tipo de usuario</th>
                    <th class="sin-borde" ></th>
                </tr>
                
                <?php
            foreach ($rows as $row) {
                //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                ?>
            <tr>
                <td><?php echo $row['usuario']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['clave']; ?></td>
                <td><?php echo $row['tipousuario']; ?>    </td>
                
                
                <td class="sin-borde"><a href="editar_usuario.php?id_usuario=<?php echo $row['id_usuario']; ?>">
                    <button class="boton-actualizar">
                            Actualizar
                    </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
       <div class="container-button">
            <a href="alta_usuario.php"><input type="submit" class="botton-login" name="alta_usuarios" value="Registrar otro usuario " /></a> 
        </div>		
   <?php
           //Cerramos la oonexion a la base de datos **********************************************
           $conn = null;
    ?>
		 
    </section>

    <?php
         require_once "../includes/pie.php";
    ?>

</body>
    <?php
         include_once "../includes/container-menu.php";
    ?>     
</html>