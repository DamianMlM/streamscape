<?php
  require_once "../php/proteccion.php";
  require_once "../php/bd.php";

  $nombre_plataforma = $_POST["name_plataforma"];
  $url_plataforma = $_POST["url_plataforma"];
  $no_titulos = $_POST["titulos_plataforma"];
  $tipo_suscripcion = $_POST["tipo_suscripcion"];
  // Escribimos la consulta para recuperar los departamentos de la 
  // tabla departamentos
  $sql = "SELECT * FROM plataforma WHERE nombre = '$nombre_plataforma'";
  // $sql = 'SELECT numero, nombre FROM empleados';
  // Almacenamos los resultados de la consulta en una variable llamada 
  // $smtp a partir de la conexión
  $result = $conn->query($sql);
  // Recuperamos los valores de los registros de la tabla que ya están 
  // en la variable $stmt
  $rows = $result->fetchAll();
  // Verificamos si está vacia la variable $smtp, si es positivo imprimimos 
  // en pantalla lo que trae de contenido
  if (empty($rows)) {
      $sqlINSERT1 = "INSERT INTO plataforma (nombre, url, total_titulos, tipo_suscripcion) VALUES ('$nombre_plataforma', '$url_plataforma' , $no_titulos, '$tipo_suscripcion') ";

      
      $conn->exec($sqlINSERT1);
      $mensaje = "PLATAFORMA REGISTRADA SATISFACCTORIAMENTE";
  }else{
      echo "<script>alert('ERROR: ESA PLATAFORMA YA EXISTE EN LA BASE DE DATOS');</script>";
      $mensaje = "--ESA PLATAFORMA YA EXISTE EN LA BASE DE DATOS--";
      $nombre_plataforma = "<b style='color:#973737; font-weight:bold;'>NO SE GUARDO NADA</b>";
      // $nombre_plataforma = "";
      $url_plataforma = "";
      $no_titulos = "";
      $tipo_suscripcion = "";
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
            <h2 >Informacion de la plataforma</h2>
        </div>
        
        <div class="container-intro-info">
        

            <label> <?php echo $mensaje ?> </label>
                    
            <label> <strong>  Nombre de la plataforma:  </strong> <?php echo $nombre_plataforma ?></label>
            <label> <strong> URL de la plataforma:</strong> <?php echo $url_plataforma?></label>
            <label> <strong> Cantidad de titulos de la plataforma:</strong> <?php echo $no_titulos?></label><br>
            <label> <strong> Tipo de suscripcion:</strong>  <?php echo $tipo_suscripcion?></label>
            
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