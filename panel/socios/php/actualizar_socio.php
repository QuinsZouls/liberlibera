<?php
//include("../../../php/conexion.php");
require'../../../php/crypto.php';
$id=$_POST['Id_socio'];
$nombre=encrypt($_POST['Nombre'],$key);
$sexo=encrypt($_POST['Sexo'],$key);
$alumno=$_POST['Alumno'];
$grado=encrypt($_POST['Grado'],$key);
$grupo=encrypt($_POST['Grupo'],$key);
$especialidad=encrypt($_POST['Especialidad'],$key);
$turno=encrypt($_POST['Turno'],$key);
$no_control=encrypt($_POST['No_control'],$key);
$nacimiento=$_POST['Fecha_de_nacimiento'];
$email=encrypt($_POST['Email'],$key);
$facebook=encrypt($_POST['Facebook'],$key);
$sql="UPDATE socios SET  Nombre_completo='".$nombre."', Sexo='".$sexo."', Alumno='".$alumno."', Grado='".$grado."', Grupo='".$grupo."', Especialidad='".$especialidad."', Turno='".$turno."', No_control='".$no_control."', Fecha_de_nacimiento='".$nacimiento."', Email='".$email."', Facebook='".$facebook."'   WHERE Id_socio=".$id."";
//$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    $servername = "localhost";
    $username = "liberlib_sql";
    $password = "S5_c[!2toM]";
    $dbname = "liberlib_liberlibera";
	/**$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "liberlibera";**/

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if (!$conn->query($sql)) {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
