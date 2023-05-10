<?php
  require_once "../php/proteccion.php";
  require_once "../php/bd.php";
  $result;
        
        
  // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$id_plataforma= $_GET["id_plataforma"];

// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
// los valores por GET son tipo STRING ************************************************************



$id_plataforma = (int)$id_plataforma; 

//Verificamos id de la serie
if($id_plataforma == "")
{
  header("Location: plataforma_no_encontrada.php"); 
  exit;
}
if(is_null($id_plataforma))
{
  header("Location: plataforma_no_encontrada.php"); 
  exit;
}
if(!is_int($id_plataforma))
{
  header("Location: plataforma_no_encontrada.php"); 
}
  
  // Escribimos la consulta para recuperar los registros de la tabla de MySQL
  // $sql = 'SELECT S.id_serie, S.nombre_serie, S.genero, S.fecha_estreno, S.idioma_original, S.clasificacion, S.no_temporadas, S.puntuacion, S.director, S.actor_principal, S.descripcion, P.nombre FROM serie S '.'INNER JOIN plataforma P ON S.id_plataforma = P.id_plataforma WHERE S.id_serie ='. $id_serie;
  $sql = 'SELECT *  FROM plataforma WHERE id_plataforma ='.$id_plataforma;

  
  // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
  $result = $conn->query($sql);
  
  // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
  $rows = $result->fetchAll();
  
  // Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
  // (Variable con varias valores)
  // y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
  // El resultado se mostrará en una tabla HTML ***************************************************

  //Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL ***************
  $sqlBorrar = "DELETE FROM plataforma WHERE id_plataforma ='$id_plataforma'";
      
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
            <h2 >Informacion de la plataforma eliminada</h2>
        </div>
        
        <div class="container-intro-info">
        
        <div  style="overflow-x:auto;" >
            <table>
            <tr>
                <th>ID PLlataforma</th>
                <th>Nombre</th>
                <!-- <th>URL</th> -->
                <th>Cant. Titulos</th>
                <th>Tipo de suscripcion</th>
                
            </tr>
        
            <?php
                foreach ($rows as $row) {
                //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
            ?>
                <tr>
                    <td><?php echo $row['id_plataforma']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <!-- <td><?php echo $row['url']; ?></td> -->
                    <td><?php echo $row['total_titulos']; ?></td>
                    <td><?php echo $row['tipo_suscripcion']; ?></td>
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
            <a href="alta_tabla1.php"><input type="submit" class="botton-login" name="alta_plataformas" value="Registrar otra plataforma " /></a> 
        </div>	
        <div class="container-button">
            <a href="reporte_general_plataforma.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general" /></a> 
        </div>	
        
    </section>

    <?php
         require_once "../includes/pie.php";
    ?>
</body>

<script>
     /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
    });
    }                   


    const btnMenu = document.getElementById("btn-menu");
    const containerMenu = document.querySelector(".container-menu");
    const contMenu = document.querySelector(".cont-menu");
    // const sideNav = document.querySelector(".sidenav");
  
    btnMenu.addEventListener("click", () => {
      containerMenu.classList.toggle("visible");
      contMenu.classList.toggle("visible");
    });
  </script>
</html>