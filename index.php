<?php
    //Inicializamos el uso de las sesiones ****
	session_start();
	// Quitamos todas las variables de sesiones
	$_SESSION["validado"]="";
	session_unset();

	// Eliminamos la sesion *******************
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamscape</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/valida_login.js"></script>
    <link rel="icon" href="imagenes/streamscape_icono.png" type="image/x-icon">
</head>
<body>
    <main>
    <div class="header">
                
			<a href="" class="logo">
                <span><img src="imagenes/streamscape.png" alt="Logo"></span>Streamscape 
            </a>
        <div class="header-right" >
            <a href="index.php" >Inicio</a>
            <a href="../index.php" >Contacto</a>
        </div>
     </div>
    <!-- Banner -->
    <section class="banner">
            <div class="banner-img">
            </div>
    </section>
    <section class="container-intro">
        <div class="container-intro-title">
            <h2 >Streamscape</h2>
        </div>

        <div class="container-intro-info">
            <p>
                <strong>¡Bienvenid@ </strong> a nuestra plataforma de entretenimiento! 
                Aquí podrás encontrar toda la información que necesitas
                 sobre las mejores series del momento y en qué plataforma 
                 están disponibles. Pero eso no es todo, ¡también puedes 
                 unirte a nuestra comunidad y compartir tus series favoritas
                  con otros usuarios! Así, juntos podemos descubrir y disfrutar 
                  de las mejores historias en la pantalla chica. <br> ¡No te quedes
                fuera de la diversión!
            </p>
        </div>
        <div class="container-intro-info-button">
            <!-- Button to open the modal login form -->
                <button class="botton-login" onclick="document.getElementById('id01').style.display='block'">Iniciar Sesión</button>
            <!-- Button to open the modal login form -->
                <button class="botton-login" onclick="document.getElementById('id02').style.display='block'">Registrarse</button>
        </div>
        <!-- The Modal -->
        <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none' "class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" method="post" action="php/validacion.php" onSubmit="return validaLogin()" >
            <div class="imgcontainer">
            <img src="imagenes/img_avatar2.png" alt="Avatar" class="avatar">    
            </div>

            <div class="container">
            <label for="usuario"><b>Username</b></label>
            <input type="text"  name="usuario" id="usuario" placeholder="Enter Username"  >

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password"  placeholder="Enter Password"  >

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
            <span class="txtpassword">Forgot <a href="#">password?</a></span>
            </div>
        </form>
        </div>

                <!-- The Modal (contains the Sign Up form) -->
        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
        
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
        
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        
                <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>
        
                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signup">Sign Up</button>
                </div>
            </div>
            </form>
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
</html>