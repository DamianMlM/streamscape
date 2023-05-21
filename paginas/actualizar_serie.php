<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos
    include_once "../php/proteccion.php";
    require_once "../php/bd.php";

    $plataforma = $_POST["Combo_plataforma"];
    $id_serie = $_POST["txt_id_serie_oculto"];
    $nombre_serie = $_POST["name_serie"];
    $genero_serie = $_POST["txt_genero"];
    $date_estreno1 = $_POST["txt_fecha"];
    $date_estreno = date('Y-m-d', strtotime($date_estreno1));
    $idioma_serie = $_POST["combo_idioma"];
    $clasificacion_serie = $_POST["combo_clasificacion"];
    $no_temporadas = $_POST["txt_temporadas"];
    $puntuacion_serie = $_POST["combo_puntuacion"];
    $nombre_director = $_POST["txt_director"];
    $nombre_actor= $_POST["txt_actor"];
    $descripcion_serie= $_POST["txt_descripcion"];
    

    // Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de series
    $sqlUPDATE  = "UPDATE serie SET nombre_serie = '$nombre_serie', genero = '$genero_serie', 
	               fecha_estreno = '$date_estreno', idioma_original = '$idioma_serie', 
				   clasificacion = '$clasificacion_serie', no_temporadas = $no_temporadas,
                   puntuacion = $puntuacion_serie, director = '$nombre_director', actor_principal = '$nombre_actor',
                   descripcion = '$descripcion_serie', id_plataforma = $plataforma
                WHERE id_serie = " . $id_serie;
    // Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO
    $conn->exec($sqlUPDATE);
	
	// Escribimos la consulta para recuperar el nombre del Departamento del Empleado editado
	// Y no mostrar en pantalla el ID de departamento que no es entendible para el usuario
    $sqlPlataforma = "SELECT id_plataforma, nombre FROM plataforma WHERE id_plataforma=" . $plataforma;
    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
    $stmt2 = $conn->query($sqlPlataforma);
    // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
    $rows2 = $stmt2->fetchAll();
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows2)) {
        $result2 = "No se encontró esa plataforma !!";
    } else {
		foreach ($rows2 as $row2) 
		{
			//Esta será la variable que se mostrará en pantalla con el Nombre Descriptivo de la plataforma
			//En lugar de mostrar el ID de plataforma que no es entendible para el usuario final
			$NombrePlataforma = $row2['nombre'];
		}
	}
   


    // Escribimos la consulta para recuperar las series
    $sql = "SELECT * FROM serie WHERE id_serie  = '$id_serie'";
    // $sql = "SELECT * FROM serie WHERE id_serie = '$id_serie'";


    
    // $sql = 'SELECT numero, nombre FROM empleados';
    // Almacenamos los resultados de la consulta en una variable llamada 
	// // $smtp a partir de la conexión
    $result = $conn->query($sql);
    // // Recuperamos los valores de los registros de la tabla que ya están 
	// // en la variable $stmt
    $rows = $result->fetchAll();
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
            <h2 >Informacion de la serie actualizada</h2>
        </div>
        
        <div class="container-intro-info">
        

            
                    
            <label> <strong>Plataforma:  </strong> <?php echo $NombrePlataforma ?></label> <br>
            <label> <strong>Nombre de la serie:  </strong> <?php echo $nombre_serie ?></label><br>
            <label> <strong>Genero:  </strong> <?php echo $genero_serie ?></label><br>
            <label> <strong>Fecha:  </strong> <?php echo $date_estreno ?></label><br>
            <label> <strong>Idioma Original:  </strong> <?php echo $idioma_serie ?></label><br>
            <label> <strong>Clasificacion:  </strong> <?php echo $clasificacion_serie ?></label><br>
            <label> <strong>Temporadas:  </strong> <?php echo $no_temporadas ?></label><br>
            <label> <strong>Puntuacion:  </strong> <?php echo $puntuacion_serie ?></label><br>
            <label> <strong>Director:  </strong> <?php echo $nombre_director ?></label><br>
            <label> <strong>Actor principal:  </strong> <?php echo $nombre_actor ?></label><br>
            <label> <strong>Sinopsis:  </strong> <?php echo $descripcion_serie ?></label><br>
            
            
        </div>
        <div class="container-button">
            <a href="alta_serie.php"><input type="submit" class="botton-login" name="alta_plataformas" value="Registrar otra serie" /></a> 
        </div>	
        <div class="container-button">
            <a href="reporte_general_series.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general" /></a> 
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