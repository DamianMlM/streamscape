<?php
    include_once "../php/proteccion.php";
    require_once "../php/bd.php";

    $plataforma = $_POST["Combo_plataforma"];
    // $id_serie = $_POST["id_serie"];
    $nombre_serie = $_POST["name_serie"];
    $genero_serie = $_POST["txt_genero"];
    $date_estreno1 = $_POST["txt_fecha"];
    $date_estreno = date('Y-m-d', strtotime($date_estreno1));
    $idioma_serie = $_POST["combo_idioma"];
    $clasifiacion_serie = $_POST["combo_clasificacion"];
    $no_temporadas = $_POST["txt_temporadas"];
    $puntuacion_serie = $_POST["combo_puntuacion"];
    $nombre_director = $_POST["txt_director"];
    $nombre_actor= $_POST["txt_actor"];
    $descripcion_serie= $_POST["txt_descripcion"];
    

    
    $sql_comprobacion = "SELECT MAX(id_serie) FROM serie;";
    $result3 = $conn->query($sql_comprobacion);
    // // Recuperamos los valores de los registros de la tabla que ya están 
	// // en la variable $stmt
    $rows3 = $result3->fetchAll();

    foreach($rows3 as $row3){
                $id_serie = $row3['MAX(id_serie)'];
    }

    // $id_serie = $sql_comprobacion;
    // echo ($id_serie);


    // Escribimos la consulta para recuperar las series
    $sql = "SELECT * FROM serie WHERE nombre_serie  = '$nombre_serie'";
    // $sql = "SELECT * FROM serie WHERE id_serie = '$id_serie'";


    
    // $sql = 'SELECT numero, nombre FROM empleados';
    // Almacenamos los resultados de la consulta en una variable llamada 
	// // $smtp a partir de la conexión
    $result = $conn->query($sql);
    // // Recuperamos los valores de los registros de la tabla que ya están 
	// // en la variable $stmt
    $rows = $result->fetchAll();


	// // Verificamos si está vacia la variable $smtp, si es positivo imprimimos 
	// // en pantalla lo que trae de contenido
    if (empty($rows)) {
        $sqlINSERT1 = "INSERT INTO serie(nombre_serie, genero, 
        fecha_estreno, idioma_original, clasificacion, no_temporadas, 
        puntuacion, director, actor_principal, descripcion, id_plataforma)
         VALUES ('$nombre_serie', '$genero_serie', '$date_estreno', '$idioma_serie', 
         '$clasifiacion_serie', $no_temporadas, $puntuacion_serie, '$nombre_director',
          '$nombre_actor', '$descripcion_serie', '$plataforma') ";

        $conn->exec($sqlINSERT1);
        $mensaje = "SERIE REGISTRADA SATISFACCTORIAMENTE";



        $sql2 = "SELECT * FROM plataforma WHERE id_plataforma = '$plataforma'";
        // $sql = 'SELECT numero, nombre FROM empleados';
        // Almacenamos los resultados de la consulta en una variable llamada 
        // $smtp a partir de la conexión
        $result2 = $conn->query($sql2);
        // Recuperamos los valores de los registros de la tabla que ya están 
        // en la variable $stmt
        $rows2 = $result2->fetchAll();
    
        foreach($rows2 as $row2){
            $plataforma = $row2['nombre'];
        }
    
        // if ($sexo == 'M') {
        //     # code...
        //     $sexo2 = 'MASCULINO';
        // }else{
        //     $sexo2 = 'FEMENINO';
        // }

    }else{
        $plataforma ="";
        $mensaje = "ESA SERIE  YA EXISTE EN LA BASE DE DATOS";
        $nombre_serie = "<p style='color:red; font-weight:bold;'>NO SE GUARDO NADA</p>";
        $genero_serie = "";
        $date_estreno = "";
        $idioma_serie = "";
        $clasifiacion_serie = "";
        $no_temporadas = "";
        $puntuacion_serie = "";
        $nombre_director = "";
        $nombre_actor= "";
        $descripcion_serie= "";
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
    
        

</head>
<body>
    <main>
    <?php
         require_once "../includes/nav-banner.php";
    ?>



    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Informacion de la serie</h2>
        </div>
        
        <div class="container-intro-info">
        

            <label> <?php echo $mensaje ?> </label><br>
                    
            <label> <strong>Plataforma:  </strong> <?php echo $plataforma ?></label> <br>
            <label> <strong>Nombre de la serie:  </strong> <?php echo $nombre_serie ?></label><br>
            <label> <strong>Genero:  </strong> <?php echo $genero_serie ?></label><br>
            <label> <strong>Fecha:  </strong> <?php echo $date_estreno ?></label><br>
            <label> <strong>Idioma Original:  </strong> <?php echo $idioma_serie ?></label><br>
            <label> <strong>Clasificacion:  </strong> <?php echo $clasifiacion_serie ?></label><br>
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
            <a href="reporte_general_serie.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general" /></a> 
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