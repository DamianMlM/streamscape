<?php
  include_once "../php/proteccion.php";
  if ($_SESSION["tipo_usuario"]!='Administrador' ) 
{
   //Redireccionamos a la página de firma de usuarios (LOGIN)
   header("Location: menu_principal_general.php");
   exit;
}
  require_once "../php/bd.php";

  $usuario = $_POST["name_user"];
  $correo = $_POST["correo_user"];
  $password = trim($_POST["clave_user"]);
  $password = md5($password);
  $tipo_usuario1 = $_POST["tipo_user"];

  if ($tipo_usuario1 == '1') {
    # code...
    $tipo_usuario = 'Administrador';
    }else if($tipo_usuario1 == '2') {
    $tipo_usuario = 'General';
    }
  
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
  // $sql = 'SELECT numero, nombre FROM empleados';
  // Almacenamos los resultados de la consulta en una variable llamada 
  // $smtp a partir de la conexión
  $result = $conn->query($sql);
  // Recuperamos los valores de los registros de la tabla que ya están 
  // en la variable $stmt
  $rowusuario = $result->fetchAll();
  // Verificamos si está vacia la variable $smtp, si es positivo imprimimos 
  // en pantalla lo que trae de contenido
  $sql1 = "SELECT * FROM usuarios WHERE  correo = '$correo' ";
  // $sql = 'SELECT numero, nombre FROM empleados';
  // Almacenamos los resultados de la consulta en una variable llamada 
  // $smtp a partir de la conexión
  $result = $conn->query($sql1);
  // Recuperamos los valores de los registros de la tabla que ya están 
  // en la variable $stmt
  $rowcorreo = $result->fetchAll();
  // Verificamos si está vacia la variable $smtp, si es positivo imprimimos 
  // en pantalla lo que trae de contenido
  if (empty($rowusuario) AND (empty($rowcorreo))) {
      $sqlINSERT1 = "INSERT INTO usuarios (usuario, correo, clave, tipousuario) 
      VALUES ('$usuario', '$correo' , '$password', '$tipo_usuario') ";

      
      $conn->exec($sqlINSERT1);
      $mensaje = "USUARIO REGISTRADO SATISFACCTORIAMENTE";
  }
  else if(!empty($rowusuario)) {
      echo "<script>alert('ERROR: ESE USUARIO YA EXISTE EN LA BASE DE DATOS');</script>";
      $mensaje = "--ESE USUARIO YA EXISTE EN LA BASE DE DATOS--";
      $usuario = "<b style='color:#973737; font-weight:bold;'>NO SE GUARDO NADA</b>";
      // $nombre_plataforma = "";
      $correo = "";
      $password = "";
      $tipo_usuario = "";
  }
  else if(!empty($rowcorreo)){
    echo "<script>alert('ERROR: YA EXISTE UN USUARIO REGISTRADO CON ESE CORREO EN LA BASE DE DATOS--');</script>";
      $mensaje = "-- YA EXISTE UN USUARIO REGISTRADO CON ESE CORREO EN LA BASE DE DATOS--";
      $usuario = "<b style='color:#973737; font-weight:bold;'>NO SE GUARDO NADA</b>";
      // $nombre_plataforma = "";
      $correo = "";
      $password = "";
      $tipo_usuario = "";
  }
  else{
    echo "<script>alert('ERROR: YA EXISTE UN USUARIO CON ESE NOMBRE Y CORREO EN LA BASE DE DATOS');</script>";
    $mensaje = "--YA EXISTE UN USUARIO CON ESE NOMBRE DE USUARIO Y CORREO EN LA BASE DE DATOS--";
    $usuario = "<b style='color:#973737; font-weight:bold;'>NO SE GUARDO NADA</b>";
    // $nombre_plataforma = "";
    $correo = "";
    $password = "";
    $tipo_usuario = "";
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
            <h2 >Informacion del usuario</h2>
        </div>
        
        <div class="container-intro-info">
        

            <label> <?php echo $mensaje ?> </label> <br>
                    
            <label> <strong>  Usuario:  </strong> <?php echo $usuario ?></label> <br>
            <!-- <label> <strong> Contraseña:</strong> <?php echo $url_plataforma?></label> -->
            <label> <strong> correo:</strong> <?php echo $correo?></label><br>
            <label> <strong> Tipo de usuario:</strong>  <?php echo $tipo_usuario?></label><br>
            
        </div>
        <div class="container-button">
            <a href="alta_usuario.php"><input type="submit" class="botton-login" name="alta_plataformas" value="Registrar otro usuario " /></a> 
        </div>	
        <div class="container-button">
            <a href="reporte_general_usuarios.php"><input type="submit" class="botton-login" name="reporte_general" value="Ir al reporte general" /></a> 
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