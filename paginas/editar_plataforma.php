<?php
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
  require_once "../php/bd.php";
  // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idPlataforma = $_GET["idPlataforma"];
	
	$idPlataforma = (int)$idPlataforma;
	
	// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	// Cuando el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
    $sql = 'SELECT *  FROM plataforma WHERE id_plataforma ='.$idPlataforma;
	
	// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
    // El resultado se mostrará en la página, en el BODY del HTML **********************************************
    if (empty($rows)) {
        $result = "No se encontraron plataformas con esa información !!";
		header("Location: reporte_general_plataforma.php");
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
             <form action="actualizar_plataforma.php" method="post" id="formulario_plataforma"  onsubmit="return validaForm()"  >
                <div>
                <?php
                    foreach ($rows as $row) {
                    //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
                ?>
                    <label for="txt_id_plataforma"> Id de la plataforma: </label>
                    <input type="text" name="txt_id_plataforma" id="txt_id_plataforma" size="10" disabled
					 value="<?php echo $row['id_plataforma']; ?>" />
					
                        <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->					
					<input type="hidden"  name="txt_id_plataforma_oculto"  id="txt_id_plataforma_oculto" size="10" 
					value="<?php echo $row['id_plataforma']; ?>" />
					

                    <label for="name_plataforma">Nombre de la plataforma:</label>
                    <input type="text" name="name_plataforma" id="name_plataforma" size="40" maxlength="50"
                    value="<?php echo $row['nombre']; ?>" /> <br />

                    
                    <label for="url_plataforma"> URL de la plataforma:</label>
                    <input type="text" name="url_plataforma" id="url_plataforma" size="45" maxlength="100"
                    value="<?php echo $row['url']; ?>">   
                    
                    <label for="titulos_plataforma"> Número de titulos: </label>
                    <input type="text" name="titulos_plataforma" id="titulos_plataforma" size="15" maxlength="7"
                    value="<?php echo $row['total_titulos']; ?>">   
                    
                    <label for="tipo_suscripcion"> Tipo de suscripción</label>
                    <select name="tipo_suscripcion" id="tipo_suscripcion"  >
                                <option value="0">Selecciona si es gratis o de paga</option>
                                <option value="1"<?php if ($row['tipo_suscripcion'] == 'Gratis') { echo ' selected'; } ?>>Gratis</option>
                                <option value="2"<?php if ($row['tipo_suscripcion'] == 'Paga') { echo ' selected'; } ?>>Paga</option>  
                                </select> 
                    <?php } ?>
                    
                    <div class="container-button">
                        <input type="submit" class="botton-login" name="buscarSeries" value="Actualizar plataforma " />
                        <a href="reporte_general_plataforma.php"><input type="button" class="botton-login" name="update_plataformas" value="Cancelar Actualización " /></a>

                    </div>	
                    
                </div>
                
            </form>
            <!-- <div class="container-button">
            <a href="reporte_general_plataforma.php"><input type="button" class="botton-login" name="update_plataformas" value="Cancelar Actualización " /></a>
            </div>	 -->
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