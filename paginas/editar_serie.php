<?php
  include_once "../php/proteccion.php";
  require_once "../php/bd.php";
   // Escribimos la consulta para recuperar las plataformas  de la tabla plataformas
   $sqlPlataformas = 'SELECT id_plataforma, nombre  FROM plataforma';
   // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
   $stmt2 = $conn->query($sqlPlataformas);
   // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
   $rows2 = $stmt2->fetchAll();
   // Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
   if (empty($rows2)) {
       $result2 = "No se encontraron plataformas!!";
   }

   // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
   $id_serie= $_GET["id_serie"];
   
   // Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
   // los valores por GET son tipo STRING ************************************************************
   $id_serie = (int)$id_serie; //*****************************************************************
   
   //Verificamos que SI VENGA EL NUMERO DE SERIE **************************************************
   if($id_serie == "")
   {
       header("Location: reporte_general_serie.php");
       exit;
   }
   if(is_null($id_serie))
   {
       header("Location: reporte_general_serie.php");
       exit;
   }

           // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
   $sql3 ='SELECT S.id_serie, S.nombre_serie, S.genero, S.fecha_estreno,
           S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, 
           S.director, S.actor_principal, S.descripcion, P.id_plataforma , P.nombre
           FROM serie S INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma
           WHERE S.id_serie = ' . $id_serie;

   // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
   $result = $conn->query($sql3);
   
   // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
   $rows = $result->fetchAll();
   
   // El resultado se mostrará en la página, en el BODY ***************************************************
   if (empty($rows)) {
       $result = "No se encontraron series !!";
       header("Location: reporte_general_serie.php");
       exit;
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
    <script src="../javascript/valida_alta_serie.js"> </script>

</head>
<body>
    <main>
    <?php
         require_once "../includes/nav-banner.php";
    ?>



    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Actualiza la informacion de la serie</h2>
        </div>
        
        <div class="container-intro-info">
        <form action="actualizar_serie.php" method="post" id="formulario1" class="form_altaplataforma" onsubmit="return validaForm()">
                    <div>
                        <label for="Combo_plataforma">Plataforma:</label> <br>
                        <select name="Combo_plataforma" id="Combo_plataforma">
                            <option value="0">-- Selecciona una plataforma --</option>
                            <?php 
                            foreach ($rows as $row) {
                            
                            foreach ($rows2 as $row2) {
                            ?>
                            <option value="<?php echo $row2['id_plataforma']; ?>" <?php if ($row2['id_plataforma'] == $row['id_plataforma']) { echo ' selected'; }?> > <?php echo $row2['nombre'];?> </option>
                                
                            <?php } ?>
                        </select>   
                        <br>      
                        <label for="id_serie"> Id serie:</label><br>
                        <input type="text" name="id_serie" id="id_serie" size="10" maxlength="0"
                            value="<?php echo $row['id_serie']; ?>" disabled >
                        <br> 
                        <input type="hidden" 
                            name="txt_id_serie_oculto" 
                            id="txt_id_serie_oculto" 
                            size="10" 
                            value="<?php echo $row['id_serie']; ?>" />     
                        <label for="name_serie"> Nombre de la serie:</label><br>
                        <input type="text" name="name_serie" id="name_serie" size="40" maxlength="50"
                            value="<?php echo $row['nombre_serie']; ?>" />
                        <br>      
                        <label for="txt_genero">Genero:</label><br>
                        <input type="text" name="txt_genero" id="txt_genero" size="45" maxlength="50"
                            value="<?php echo $row['genero']; ?>" />      
                        <br>     
                        <label for="txt_fecha">Fecha de estreno:</label><br>
                        <input type="date" id="txt_fecha" name="txt_fecha" format="yyyy-mm-dd"
                        value="<?php echo $row['fecha_estreno']; ?>" />    
                        <br>  
                        <label for="combo_idioma">Idioma original de la serie: </label><br>
                        <select name="combo_idioma" id="combo_idioma">
                            <option value="0">Selecciona el idioma original</option>
                            <option value="Ingles" <?php if ($row['idioma_original'] == 'Ingles') { echo ' selected'; } ?>>Ingles</option>
                            <option value="Español (Mexico)" <?php if ($row['idioma_original'] == 'Español (Mexico)') { echo ' selected'; } ?>>Español (Mexico)</option>
                            <option value="Español (España)" <?php if ($row['idioma_original'] == 'Español (España)') { echo ' selected'; } ?>>Español (España)</option>
                            <option value="Frances" <?php if ($row['idioma_original'] == 'Frances') { echo ' selected'; } ?>>Frances</option>
                            <option value="Italiano" <?php if ($row['idioma_original'] == 'Italiano') { echo ' selected'; } ?>>Italiano</option>
                            <option value="Portugues" <?php if ($row['idioma_original'] == 'Portugues') { echo ' selected'; } ?>>Portugues</option>
                        </select> 
                        <br>      
                        
                        <label for="combo_clasificacion">Clasificación:</label><br>
                        <select name="combo_clasificacion" id="combo_clasificacion">
                            <option value="0">Selecciona la clasificación</option>
                            <option value="TV-Y" <?php if ($row['clasificacion'] == 'TV-Y') { echo ' selected'; } ?> >TV-Y</option>
                            <option value="TV-Y7" <?php if ($row['clasificacion'] == 'TV-Y7') { echo ' selected'; } ?> >TV-Y7</option>
                            <option value="G" <?php if ($row['clasificacion'] == 'G') { echo ' selected'; } ?> >G</option>
                            <option value="TV-G" <?php if ($row['clasificacion'] == 'TV-G') { echo ' selected'; } ?> >TV-G</option>
                            <option value="PG" <?php if ($row['clasificacion'] == 'PG') { echo ' selected'; } ?> >PG</option>
                            <option value="TV-PG" <?php if ($row['clasificacion'] == 'TV-PG') { echo ' selected'; } ?> >TV-PG</option>
                            <option value="PG-13"<?php if ($row['clasificacion'] == 'PG-13') { echo ' selected'; } ?> >PG-13</option>
                            <option value="TV-14" <?php if ($row['clasificacion'] == 'TV-14') { echo ' selected'; } ?> >TV-14</option>
                            <option value="R" <?php if ($row['clasificacion'] == 'R') { echo ' selected'; } ?> >R</option>
                            <option value="TV-MA" <?php if ($row['clasificacion'] == 'TV-MA') { echo ' selected'; } ?> >TV-MA</option>
                            <option value="NC-17"<?php if ($row['clasificacion'] == 'NC-17') { echo ' selected'; } ?> >NC-17</option>
                        </select> 
                        <br>      
                        
                        <label for="txt_temporadas">Numero de temporadas: </label><br>
                        <input type="text" name="txt_temporadas" id="txt_temporadas" size="5" maxlength="2"     
                        value="<?php echo $row['no_temporadas']; ?>" />
                        <br>    
                        
                        <label for="combo_puntuacion">Puntuacion:</label><br>
                        <select name="combo_puntuacion" id="combo_puntuacion">
                            <option value="0">Selecciona la puntuacion</option>
                            <option value="1" <?php if ($row['puntuacion'] == '1') { echo ' selected'; } ?> >1</option>
                            <option value="2" <?php if ($row['puntuacion'] == '2') { echo ' selected'; } ?>>2</option>
                            <option value="3" <?php if ($row['puntuacion'] == '3') { echo ' selected'; } ?>>3</option>
                            <option value="4" <?php if ($row['puntuacion'] == '4') { echo ' selected'; } ?>>4</option>
                            <option value="5" <?php if ($row['puntuacion'] == '5') { echo ' selected'; } ?>>5</option>
                        </select> 
                        <br>        
                        
                        <label for="txt_director">Nombre del director:</label><br>
                        <input type="text" name="txt_director" id="txt_director" size="40" maxlength="100"
                        value="<?php echo $row['director']; ?>" />
                        <br>    
                        
                        <label for="txt_actor">Nombre del actor principal:</label><br>
                        <input type="text" name="txt_actor" id="txt_actor" size="40" maxlength="100"
                        value="<?php echo $row['actor_principal']; ?>" />
                        <br>       
                        
                        <label>Descripcion de la serie: </label><br/><br>
                        <textarea name="txt_descripcion" id="txt_descripcion" rows="10" cols="50" maxlength="400" ><?php echo $row['descripcion']; ?></textarea>
                        <br>
                        
                    </div>
                  
                    <div class="container-button">
                        <input type="submit" class="botton-login" name="actualizar_series" value="Actualizar serie " />
                        <a href="reporte_general_series.php"><input type="button" class="botton-login" name="update_plataformas" value="Cancelar Actualización " /></a>

                    </div>	
                </form>
                <?php } ?>
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