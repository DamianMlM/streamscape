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
        
        
  // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$id_user= $_GET["id_usuario"];

// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
// los valores por GET son tipo STRING ************************************************************



$id_user = (int)$id_user; 

//Verificamos id de la serie
if($id_user == "")
{
  header("Location: plataforma_no_encontrada.php"); 
  exit;
}
if(is_null($id_user))
{
  header("Location: plataforma_no_encontrada.php"); 
  exit;
}
if(!is_int($id_user))
{
  header("Location: plataforma_no_encontrada.php"); 
}
  
  // Escribimos la consulta para recuperar los registros de la tabla de MySQL
  // $sql = 'SELECT S.id_serie, S.nombre_serie, S.genero, S.fecha_estreno, S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, S.director, S.actor_principal, S.descripcion, P.nombre FROM serie S '.'INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma WHERE S.id_serie ='. $id_serie;
  $sql = 'SELECT *  FROM usuarios WHERE id_usuario ='.$id_user;

  
  // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
  $result = $conn->query($sql);
  
  // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
  $rows = $result->fetchAll();
  
  // Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
  // (Variable con varias valores)
  // y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
  // El resultado se mostrará en una tabla HTML ***************************************************

  //Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL ***************
  $sqlBorrar = "DELETE FROM usuarios WHERE id_usuario ='$id_user'";
      
  // Ejecutamos la sentencia DELETE de SQL a partir de la conexión usando PDO ****************************
  $conn->exec($sqlBorrar);

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
            <h2 >Informacion del usuario eliminado</h2>
        </div>
        
        <div class="container-intro-info">
        
        <div  style="overflow-x:auto;" >
            <table>
            <tr>
                <th>ID usuario</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Tipo de usuario</th>
                
            </tr>
        
            <?php
                foreach ($rows as $row) {
                //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
            ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['clave']; ?></td>
                    <td><?php echo $row['tipousuario']; ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                
                </tr>
            </table> 
   
        </div>
            



        </div>
        <div class="container-button">
            <a href="alta_usuario.php"><input type="submit" class="botton-login" name="alta_usuarios" value="Registrar otro usuario " /></a> 
        </div>	
        <div class="container-button">
            <a href="reporte_general_usuarios.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general" /></a> 
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