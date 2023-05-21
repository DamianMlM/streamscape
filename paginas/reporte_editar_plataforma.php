<?php
  include_once "../php/proteccion.php";
  //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
       
  require_once "../php/bd.php";
  $result;
  
  // Escribimos la consulta para recuperar los registros de la tabla de MySQL
  $sql = 'SELECT *  FROM plataforma WHERE id_plataforma = id_plataforma';

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
		function borrar_plataforma(plataforma)
		{
		if(confirm("¿Estás seguro de eliminar esta plataforma?") == true)
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
            <h2 >Reporte para editar plataformas</h2>
        </div>


        <div  style="overflow-x:auto;" >
            <table>
                <tr>
                    <!-- <th>ID PLlataforma</th> -->
                    <th>Nombre</th>
                    <th>Cant. Titulos</th>
                    <th>Tipo de suscripcion</th>
                    <th class="sin-borde" ></th>
                </tr>
                
                <?php
            foreach ($rows as $row) {
                //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['total_titulos']; ?></td>
                <td><?php echo $row['tipo_suscripcion']; ?>    </td>
                
                
                
                <td class="sin-borde"><a href="editar_plataforma.php?idPlataforma=<?php echo $row['id_plataforma']; ?>">
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
            <a href="alta_tabla1.php"><input type="submit" class="botton-login" name="alta_plataformas" value="Registrar otra plataforma " /></a> 
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