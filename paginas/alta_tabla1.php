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
    <script src="../javascript/valida_alta_plataforma.js"> </script>
    
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
    <?php
         include_once "../includes/container-menu.php";
    ?>   

</html>