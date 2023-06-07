<?php
include_once "../php/proteccion.php";

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
            <h2 >Contacto</h2>
        </div>
        
        <div class="container-intro-info">
            <p>
                <strong>¡Bienvenid@ </strong> a la seccion de Contacto. <br> 
                Aqui podras encontrar enlaces directos a las diferentes opciones para contactarme:
            </p>
        </div>
         
        <div class="contact">

        <div class="card">
  <img src="../imagenes/perfil.jpg" alt="Damian" style="width:100%">
  <h1>Leonel Damian Mariscal Miranda</h1>
  <p class="title">Lic. Tecnologias de la información</p>
  <p>Universidad de Guadalajara</p>
  <div style="margin: 24px 0;">
    
    <a href="#"><i class="fa fa-dribbble"> damianmariscal6@gmail.com</i></a> <br>
    <a href="#"><i class="fa fa-dribbble">leonel.mariscal5040@alumnos.udg.mx</i></a> <br>
    <a href="https://bit.ly/3E1rU9H"><i class="">Git-hub</i></a>  <br>
    <a href="https://bit.ly/3ojwWZD"><i class="">Twitter</i></a>  <br>
    <a href="https://bit.ly/3MLOxCH"><i class="">Instagram </i></a>  <br>
  </div>
  <!-- <p><button>Contact</button></p> -->
</div>   


           
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