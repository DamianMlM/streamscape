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
    
</head>
<body>
    <main>
    <!-- Navegación -->
    <nav>
		<ul>
			<li class="nav-title"><span><img src="../imagenes/streamscape.png" alt="Logo"></span>Streamscape </li>
			<li><a href="menu_principal.php" >| Menú Principal</a></li>
			<li><a href="../index.php" >| Contacto</a></li>
			<li><a href="recomendaciones.php">| Recomendaciones</a></li>
			
            <li class="nav-menu">
                <div class="boton-menu">
                    <label for="btn-menu" class="icon-menu" ><img src="../imagenes/menu_icon1.png" alt="menu-icon" class="icon-menu"></label>
                </div>
            </li>
        </ul>
        <div class="container-menu">
            <div class="cont-menu" >
                <nav>
                    <a href="">Plataformas</a>
                    <a href="">Series</a>
                    <a href="">Usuarios</a>
                    <a href="">Busqueda Personalizada</a>
                    <a href="../index.php">Cerrar sesión</a>
                </nav>
                <label for="btn-menu" class="icon-cerrar"><img src="../imagenes/cerrar_icon1.png" alt=""></label>
            </div>
        </div>
	</nav>
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
    const btnMenu = document.getElementById("btn-menu");
    const containerMenu = document.querySelector(".container-menu");
    const contMenu = document.querySelector(".cont-menu");
  
    btnMenu.addEventListener("click", () => {
      containerMenu.classList.toggle("visible");
      contMenu.classList.toggle("visible");
    });
  </script>
</html>