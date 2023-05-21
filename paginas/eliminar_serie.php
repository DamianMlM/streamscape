<?php
  include_once "../php/proteccion.php";
  require_once "../php/bd.php";
  $result;
        
        
     // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
     $id_serie= $_GET["id_serie"];
     // $id_serie= $_POST["id_serie"];
     
     // Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
     // los valores por GET son tipo STRING ************************************************************
 
 
     
     $id_serie = (int)$id_serie; 
     
     //Verificamos id de la serie
     if($id_serie == "")
     {
         header("Location: serie_no_encontrada.php"); 
         exit;
     }
     if(is_null($id_serie))
     {
         header("Location: serie_no_encontrada.php"); 
         exit;
     }
     if(!is_int($id_serie))
     {
         header("Location: serie_no_encontrada.php"); 
     }
         
         // Escribimos la consulta para recuperar los registros de la tabla de MySQL
         $sql = 'SELECT S.id_serie, S.nombre_serie, S.genero, S.fecha_estreno, S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, S.director, S.actor_principal, S.descripcion, P.nombre FROM serie S '.'INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma WHERE S.id_serie ='. $id_serie;
 
 
         
         // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
         $result = $conn->query($sql);
         
         // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
         $rows = $result->fetchAll();
         
         // Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
         // (Variable con varias valores)
         // y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
         // El resultado se mostrará en una tabla HTML ***************************************************
 
         //Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL ***************
         $sqlBorrar = "DELETE FROM serie WHERE id_serie='$id_serie'";
             
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
            <h2 >Informacion de la serie eliminada</h2>
        </div>
        
        <div class="container-intro-info">
        
        <div  style="overflow-x:auto;" >
        <table>
           <tr>
               <th>ID Serie</th>
               <th>Nombre</th>
               <th>Genero</th>
               <th>Fecha estreno</th>
               <th>Idioma</th>
               <th>Clasificacion</th>
               <th>Temporadas</th>
               <th>Puntuacion</th>
               <th>Director</th>
               <th>Actor Principal</th>
               <th>Descripción</th>
               <th>Plataforma</th>
           </tr>
       
       <?php
           foreach ($rows as $row) {
           //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
       ?>
           <tr>
               <td><?php echo $row['id_serie']; ?></td>
               <td><?php echo $row['nombre_serie']; ?></td>
               <td><?php echo $row['genero']; ?></td>
               <td><?php echo $row['fecha_estreno']; ?></td>
               <td><?php echo $row['idioma_original']; ?></td>
               <td><?php echo $row['clasificacion']; ?></td>
               <td><?php echo $row['no_temporadas']; ?></td>
               <td><?php echo $row['puntuacion']; ?></td>
               <td><?php echo $row['director']; ?></td>
               <td><?php echo $row['actor_principal']; ?></td>
               <td><?php echo $row['descripcion']; ?></td>
               <td><?php echo $row['nombre']; ?></td>
           </tr>
       <?php } ?>
       <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
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
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
       </tr>
   </table> 
   
        </div>
            



        </div>
        <div class="container-button">
            <a href="alta_serie.php"><input type="submit" class="botton-login" name="alta_plataformas" value="Registrar una serie nueva " /></a> 
        </div>	
        <div class="container-button">
            <a href="reporte_general_series.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general de las series" /></a> 
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