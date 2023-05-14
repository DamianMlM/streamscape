<?php

include_once "../php/proteccion.php";
 // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
 require_once "../php/bd.php";
 // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
 $plataforma_elegida = $_GET['q'];

 // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
 
 $sql = "SELECT S.nombre_serie, S.genero, S.fecha_estreno, 
 S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, S.director,
 S.actor_principal, S.descripcion, P.nombre
 FROM serie S INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma 
 AND P.id_plataforma='$plataforma_elegida'";

 // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
 $result = $conn->query($sql);
   
 // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
 $rows = $result->fetchAll();
 // El resultado se mostrará en la página, en el BODY ***************************************************
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
        <?php
            //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
            echo "<table>
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Fecha estreno</th>
                <th>Idioma</th>
                <th>Clas.</th>
                <th># Temp.</th>
                <th>Punt</th>
                <th>Director</th>
                <th>Actor Principal</th>
                <th>Descripción</th>
                <th>Plataforma</th>
            </tr>";
		
		 foreach ($rows as $row) {
			  //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
			echo "<tr>";
					echo "<td>" . $row['nombre_serie'] . "</td>";
					echo "<td>" . $row['genero']. "</td>";
					echo "<td>" . $row['fecha_estreno'] . "</td>";
					echo "<td>" . $row['idioma_original'] . "</td>";
					echo "<td>" . $row['clasificacion'] . "</td>";
					echo "<td>" . $row['no_temporadas'] . "</td>";
					echo "<td>" . $row['puntuacion'] . "</td>";
					echo "<td>" . $row['director'] . "</td>";
					echo "<td>" . $row['actor_principal'] . "</td>";
					echo "<td>" . $row['descripcion'] . "</td>";
					echo "<td>" . $row['nombre'] . "</td>";
			echo "</tr>";
        }
    echo "</table>";
            //Cerramos la oonexion a la base de datos **********************************************
            $conn = null;
    ?>
</body>
</html>