<?php
        //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
        include_once "../php/proteccion.php";
        include_once '../php/bd.php';
        $result;
        
        // Escribimos la consulta para recuperar los registros de la tabla de MySQL
        $sql = 'SELECT S.id_serie, S.nombre_serie, S.genero, S.fecha_estreno, 
        S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, S.director,
        S.actor_principal, S.descripcion, P.nombre
        FROM serie S INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma 
        WHERE S.id_serie = S.id_serie';
        
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
    
    <script language="javascript">
		function borrar_serie(serie)
		{
		if(confirm("¿Estás seguro de eliminar esta serie?") == true)
			{
				return true;
			} else {
				return false;
			}
		}
	</script>
</head>
<body>
    <main>
       
    <?php
         require_once "../includes/nav-banner.php";
    ?>
    
    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Reporte de las series </h2>
        </div>


        <div  style="overflow-x:auto;" >
        <table class="table_series">
           <tr>
               <!-- <th>ID Serie</th> -->
               <th>Nombre</th>
               <th>Genero</th>
               <!-- <th>Fecha estreno</th> -->
               <th>Idioma</th>
               <th>Clas.</th>
               <!-- <th># Temp.</th> -->
               <th>Punt</th>
               <th>Director</th>
               <!-- <th>Actor Principal</th> -->
               <th>Descripción</th>
               <th>Plataforma</th>
               <th class="sin-borde" ></th>
               <th class="sin-borde" ></th>
           </tr>
       <?php
            foreach ($rows as $row) {
			//Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        ?>
            <tr>
                <td><?php echo $row['nombre_serie']; ?></td>
                <td><?php echo $row['genero']; ?></td>
                <!-- <td><?php echo $row['fecha_estreno']; ?></td> -->
                <td><?php echo $row['idioma_original']; ?></td>
                <td><?php echo $row['clasificacion']; ?></td>
                <!-- <td><?php echo $row['no_temporadas']; ?></td> -->
                <td><?php echo $row['puntuacion']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <!-- <td><?php echo $row['actor_principal']; ?></td> -->
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <!-- Boton de eliminar -->
                <td class="sin-borde">
                    <a onClick="return borrar_serie(<?php echo $row['id_serie']; ?>);" 
                    href="eliminar_serie.php?id_serie=<?php echo $row['id_serie']; ?>">
                    <button class="boton-eliminar">Eliminar</button>
                </a>
            </td>
                <!-- Boton de editar/actualizar -->
                <td class="sin-borde">
                    <a href="editar_serie.php?id_serie=<?php echo $row['id_serie']; ?>">
                       <button class="boton-actualizar">Actualizar</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
        </div>
        <div class="container-button">
            <a href="alta_serie.php"><input type="submit" class="botton-login" name="alta_serie" value="Registrar una serie nueva" /></a> 
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