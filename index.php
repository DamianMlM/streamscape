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
    <link rel="icon" href="imagenes/streamscape_icono.png" type="image/x-icon">
    <script src="javascript/valida_login.js"></script>
    <script src="javascript/valida_singup.js"></script>

</head>
<body>
    <div class="header">
        <main>
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
            <form class="modal-content animate" method="post" action="php/validacion.php" onsubmit="return validaLogin()">
            <div class="imgcontainer">
            <img src="imagenes/img_avatar1.png" alt="Avatar" class="avatar">    
            </div>
     


            <div class="container">
            <label for="correo_usuario"><b>Correo:</b></label>
            <input type="email" name="correo_usuario" id="correo_usuario" placeholder="example@correo.com"  >

            <label for="txtpassword"><b>Password:</b></label>
            <input type="password" name="txtpassword" id="txtpassword"  placeholder="Enter Password"  >


            <!-- <input type="submit" class="login" name="login" value="Login"  > -->
            <button type="submit">Login</button>
            <label>
                <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
            </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
            <!-- <span class="txtpassword">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
        </div>

                <!-- The Modal (contains the Sign Up form) -->
        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" method="post" action="paginas/grabar_usuario_singup.php" onsubmit="return validaFormUsuarioSingUp()">
            <div class="container">
                <h1>Crear cuenta</h1>
                <p>Por favor llena el formulario para crear tu cuenta.</p>
                <hr>

                <label for="name_user">Usuario:</label>
                <input type="text" name="name_user" id="name_user" size="40" maxlength="50">

                <label for="correo_user"> Correo:</label>
                <input type="text" name="correo_user" id="correo_user" size="45" maxlength="100">   
                    
                <label for="clave_user"> Contraseña: </label>
                <input type="password" name="clave_user" id="clave_user" size="15" maxlength="50"> 
                    <!-- An element to toggle between password visibility -->
                <label for="showpass"> Mostrar contraseña: </label>
                <input type="checkbox" id="showpass" onclick="myFunction()"><br><br>


                <label for="repeat">Repetir contraseña</label>
                <input type="password" placeholder="Repeat Password" name="repeat" id="repeat" >

                <label for="showpass1"> Mostrar contraseña: </label>
                <input type="checkbox" id="showpass1" onclick="myFunction1()"><br><br>

                
            

                <label>
                <!-- <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me -->
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