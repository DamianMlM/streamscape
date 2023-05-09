<?php 
//Declaramos las 4 variables para la conexion a la base de datos.

$servername = "localhost";
$username = "root";
$password = "damian";
// $BasedeDatos = "prograweb";
$BasedeDatos = "4158451_pragraweb";

//En  un bloque try catch escribimos la linea de conexiíon
try{
    //Creamos la variablle $conn que usaremmos en todo tu proyecto web 
    //En esta linea de abajo se usan las 4 variables de la conexion a la BD
    //PDO signmmifica PHP Data objects y es para conectarnos a  la BD

    $conn = new PDO("mysql: host=$servername; dbname=$BasedeDatos", $username, $password);

    //Asignamos los atributos de conexion
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Imprimimos en pantalla en caso de que la conexion sea exitosa.
    // echo "<div aling='center'> <h1> Si me conecte a la base de datos: ".$BasedeDatos."</h1></div>";

}catch(PDOException $e){
    //Imprimimos en pantalla cuando no nos podemos conectar a la base de datos
    // echo "<div aling='center'> <h1> NO me conecte </h1></div>". $e->getMessage();
}
?>