<?php
include_once "../php/proteccion.php";
require_once "../php/bd.php";
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
         require_once "../includes/nav-banner_general.php";
    ?>
    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Menú principal</h2>
        </div>
        
        <div class="container-intro-info">
            <p>
                <strong>¡Bienvenid@ </strong> al menú principal. <br> 
                Aqui podras encontrar enlaces directos a las diferentes opciones:
            </p>
        </div>
        <div class="colm">

        <div class="columns">
            <ul class="price">
                <li class="header">PLATAFORMAS</li>
                <li class="grey"><a href="reporte_general_plataforma.php">Visualizar Plataformas</a></li>
                <li><a href="alta_tabla1.php">Nueva Plataforma</a></li>
            <li><a href="reporte_editar_plataforma.php">Editar Plataforma</a></li>
            <li><a href="reporte_eliminar_plataforma.php">Eliminar Plataforma</a></li>
        </ul>
        </div>

        <div class="columns">
        <ul class="price">
            <li class="header" style="background-color: #005d81">SERIES</li>
            <li class="grey"><a href="reporte_general_series.php">Visualizar Series</a></li>
            <li><a href="alta_serie.php">Nueva Serie</a></li>
            <li><a href="reporte_editar_series.php">Editar Serie</a></li>
            <li><a href="reporte_eliminar_series.php">Eliminar Serie</a></li>
        </ul>
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