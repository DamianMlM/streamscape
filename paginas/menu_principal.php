<?php
   //Inicializamos el uso de las sesiones ***********************
	session_start();
	//Verificamos que la variable de SESION tenga datos validos
	//Si los trae, dejamos visualizar esta página, de lo contrario
	//lo regresamos a la página de firma de usuarios (LOGIN)
    
	if(!isset($_SESSION["validado"]) || $_SESSION["validado"] !== "true")
	{
	   //Redireccionamos a la página de firma de usuarios (LOGIN)
       header("Location: ../index.php");
	   exit;
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
            <h2 >Menú principal</h2>
        </div>
        
        <div class="container-intro-info">
            <p>
                <strong>¡Bienvenid@ </strong> al menú principal. <br> 
                Aqui podras encontrar enlaces directos a las diferentes opciones:
            </p>
        </div>

        <div class="container-intro-menu-button">
            <div class="dropdown">
                <button class="dropbtn">Plataformas</button>
                <div class="dropdown-content">
                <a href="./reporte_general_plataforma.php">Consultar</a>
                <a href="./alta_tabla1.php">Nueva Plataforma</a>
                <a href="./reporte_general_plataforma.php">Editar plataforma</a>
                <a href="./reporte_general_plataforma.php">Eliminar plataforma</a>
                </div>
            </div>
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