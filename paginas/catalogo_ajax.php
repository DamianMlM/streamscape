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
    <script src="../javascript/object_ajax.js"> </script>
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
            <h2 >Plataformas y series</h2>
        </div>
        
        <div class="container-intro-info">
            <form id="formulario1">
                    <div>
                        <label for="ComboPlataforma">Plataforma:</label>
                        
                        <select name="ComboPlataforma" id="ComboPlataforma" 
                        onChange="showSeries(this.value);">
                        
                        <option value="0">-- Selecciona una plataforma --</option>
                            <?php 
                                foreach ($rows as $row) 
                                {
                                    echo '<option value="'.$row['id_plataforma'].'">'.$row['nombre'].'</option>';
                                }
                            ?>
                        </select>

                        <label for="ComboSeries" >Series de la plataforma seleccionada:</label>
                            <div  style="overflow-x:auto;" class="tabla_ajax">
                                <div id="txtHint">
                                </div>
                            </div>
                    </div>
                </form>
            <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
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