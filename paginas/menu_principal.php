<?php
  require_once "../php/proteccion.php";
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
        <div class="header">
                <div class="boton-menu">
                    <a>
                        <label for="btn-menu" class="icon-menu" ><img src="../imagenes/menu_icon1.png" alt="menu-icon" class="icon-menu"></label>
                    </a>
                </div>
			<a href="" class="logo">
                <span><img src="../imagenes/streamscape.png" alt="Logo"></span>Streamscape 
            </a>
        <div class="header-right" >
            <a href="menu_principal.php" >Menú Principal</a>
            <a href="../index.php" >Contacto</a>
            <a href="recomendaciones.php">Recomendaciones</a>
        </div>
     </div>
     
        <div class="container-menu">
            <div class="cont-menu" >
                <nav>
                    <div class="sidenav">
                        <button class="dropdown-btn">Plataformas 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="#">Crear</a>
                            <a href="#">Eliminar</a>
                            <a href="#">Editar</a>
                            <a href="#">Vista general</a>
                        </div>
                        <button class="dropdown-btn">Series 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="#">Crear</a>
                            <a href="#">Eliminar</a>
                            <a href="#">Editar</a>
                            <a href="#">Vista general</a>
                        </div>
                        <button class="dropdown-btn">Usuarios 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                        <a href="#">Crear</a>
                            <a href="#">Eliminar</a>
                            <a href="#">Editar</a>
                            <a href="#">Vista general</a>
                        </div>
                        <a href="#contact">Busqueda Personalizada</a>
                        <a href="../index.php">Cerrar sesión</a>
                    </div>
                </nav>
                <label for="btn-menu" class="icon-cerrar"><img src="../imagenes/cerrar_icon1.png" alt=""></label>
            </div>
        </div>
    <input type="checkbox" id="btn-menu" class="check-menu">

    
    <!-- Banner -->
    <section class="banner">
            <div class="banner-img">
            </div>
    </section>



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
    </section>

    <section class="container-pie">
        <div id="pie">
            <p class="parrafopie">Copyright 2023. All Right Reserved <br /> 
               Create by: Leonel Damian Mariscal Miranda
            </p>
        </div>
    </section>
    </main>
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