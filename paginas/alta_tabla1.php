<?php
  include_once "../php/proteccion.php";
  require_once "../php/bd.php";
  $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    $sql = 'SELECT * FROM plataforma';

    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
   $stmt = $conn->query($sql);
   // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
   $rows = $stmt->fetchAll();
   // Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
   if (empty($rows)) {
       $result = "No se encontraron resultados !!";
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
    
        

    <script language="JavaScript" type="text/javascript">

        function validaForm(){

        var nombre_plataforma = document.getElementById("name_plataforma").value;

        var url = document.getElementById("url_plataforma").value;

        var no_titulos = document.getElementById("titulos_plataforma").value;

        var suscripcion = document.getElementById("tipo_suscripcion").selectedIndex;

        if(nombre_plataforma == null || nombre_plataforma.length == 0 || nombre_plataforma == "0" ){
                alert("Olvidaste poner el nombre de la plataforma");
                document.getElementById("name_plataforma").style.background="pink";
                document.getElementById("name_plataforma").focus();
                return false;
            }
        else if(url == null || url.length == 0 || url == "0"){
                alert("Olvidaste poner el url de la plataforma");
                document.getElementById("url_plataforma").style.background="pink";
                document.getElementById("url_plataforma").focus();
                return false;
            }   
            else if(no_titulos == null || no_titulos.length == 0 || !/^([0-9])*$/.test(no_titulos)){
                alert("Debes escribir la cantidad de titulos que tiene la plataforma (Solo puedes ingresar números)");
                document.getElementById("titulos_plataforma").value = "";
                document.getElementById("titulos_plataforma").style.background="pink";
                document.getElementById("titulos_plataforma").focus();
            return false;
            }
        else if(suscripcion == null || suscripcion.length == 0 || suscripcion == "0")
            {
                alert("Olvidaste seleccionar el tipo de suscripcion");
                document.getElementById("tipo_suscripcion").style.background="pink";
                document.getElementById("tipo_suscripcion").focus();
                return false;
            }   
        return true;
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
            <h2 >Registra una plataforma</h2>
        </div>
        
        <div class="container-intro-info">
             <form action="grabar_plataformas.php" method="post" id="formulario_plataforma"  onsubmit="return validaForm()"  >
                <div>
                    <label for="name_plataforma">Nombre de la plataforma:</label>
                    <input type="text" name="name_plataforma" id="name_plataforma" size="40" maxlength="50">

                    <label for="url_plataforma"> URL de la plataforma:</label>
                    <input type="text" name="url_plataforma" id="url_plataforma" size="45" maxlength="100">   
                    
                    <label for="titulos_plataforma"> Número de titulos: </label>
                    <input type="text" name="titulos_plataforma" id="titulos_plataforma" size="15" maxlength="7">   
                    
                    <label for="tipo_suscripcion"> Tipo de suscripción:</label>
                    <select name="tipo_suscripcion" id="tipo_suscripcion">
                        <option value="0">Selecciona si es gratis o de paga</option>
                        <option value="1">Gratis</option>
                        <option value="2">Paga</option>
                    </select> 


                    <div class="container-button">
                    <input type="submit" class="botton-login" name="buscarSeries" value="Registrar plataforma " />
                    </div>	
                </div>
            </form>
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