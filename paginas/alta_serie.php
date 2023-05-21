<?php
  include_once "../php/proteccion.php";
  require_once "../php/bd.php";
  $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    $sql = 'SELECT * FROM plataforma';

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
    <script src="../javascript/valida_alta_serie.js"> </script>
    
</head>
<body>
    <main>
    <?php
         require_once "../includes/nav-banner.php";
    ?>

    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Registra una serie</h2>
        </div>
        
        <div class="container-intro-info">
             <form action="grabar_serie.php" method="post" id="formulario_plataforma"  onsubmit="return validaAltaSerie()"  >

             <div>
                    
                    <label for="Combo_plataforma">Plataforma:</label>
                    <select name="Combo_plataforma" id="Combo_plataforma">
                        
                        <option value="0">-- Selecciona una plataforma --</option>
                        
                        <?php 
                        foreach ($rows as $row) 
                        {
                            echo '<option value="'.
                            $row['id_plataforma'].'">'.
                            $row['nombre'].'</option>';
                        }
					    ?>
                    </select>
                    <br>      
                
                    <label for="name_serie"> Nombre de la serie:</label>
                    <input type="text" name="name_serie" id="name_serie" size="40" maxlength="50">
                    <br>      
                    
                    <label for="txt_genero">Genero:</label>
                    <input type="text" name="txt_genero" id="txt_genero" size="45" maxlength="50">      
                    <br>     

                    <label for="txt_fecha">Fecha de estreno:</label>
                    <input type="date" id="txt_fecha" name="txt_fecha" format="yyyy-mm-dd"> 
                    <br>  
                    
                    <label for="combo_idioma">Idioma original de la serie: </label>
                    <select name="combo_idioma" id="combo_idioma">
                        <option value="0">Selecciona el idioma original</option>
                        <option value="Ingles">Ingles</option>
                        <option value="Español (Mexico)">Español (Mexico)</option>
                        <option value="Español (España)">Español (España)</option>
                        <option value="Frances">Frances</option>
                        <option value="Italiano">Italiano</option>
                        <option value="Portugues">Portugues</option>
                    </select> 
                    <br>      
                    
                    <label for="combo_clasificacion">Clasificación:</label>
                    <select name="combo_clasificacion" id="combo_clasificacion">
                        <option value="0">Selecciona la clasificación</option>
                        <option value="TV-Y">TV-Y</option>
                        <option value="TV-Y7">TV-Y7</option>
                        <option value="G">G</option>
                        <option value="TV-G">TV-G</option>
                        <option value="PG">PG</option>
                        <option value="TV-PG">TV-PG</option>
                        <option value="PG-13">PG-13</option>
                        <option value="TV-14">TV-14</option>
                        <option value="R">R</option>
                        <option value="TV-MA">TV-MA</option>
                        <option value="NC-17">NC-17</option>
                    </select> 
					<br>      

                    <label for="txt_temporadas">Numero de temporadas: </label>
                    <input type="text" name="txt_temporadas" id="txt_temporadas" size="5" maxlength="2">      
                    <br>    
                    
                   
                    <label for="combo_puntuacion">Puntuacion:</label>
                    <select name="combo_puntuacion" id="combo_puntuacion">
                        <option value="0">Selecciona la puntuacion</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> 
                    <br>        
                    
                    <label for="txt_director">Nombre del director:</label>
                    <input type="text" name="txt_director" id="txt_director" size="40" maxlength="100">
                    <br>    
                    
                    <label for="txt_actor">Nombre del actor principal:</label>
                    <input type="text" name="txt_actor" id="txt_actor" size="40" maxlength="100">
                    <br>       

                    <label>Descripcion de la serie: </label><br/>
                    <textarea name="txt_descripcion" id="txt_descripcion" rows="10" cols="50" maxlength="400"></textarea>
                    <br>
                    <p>
                      <input type="submit" class="botton1" name="buscarSeries" value="Registrar la serie " />
                    </p>
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