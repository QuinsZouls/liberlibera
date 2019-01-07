<?php
include("../../../php/conexion.php");
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
$sql="INSERT INTO socios (Id_socio, Nombre_completo, Sexo, Alumno, Grado, Grupo, Especialidad, Turno, No_control, Fecha_de_nacimiento, Email, Facebook) VALUES ('".$id."', '".$nombre."', '".$sexo."', ".$alumno.", '".$grado."','".$grupo."',' ".$especialidad."', '".$turno."', '".$no_control."', '".$nacimiento."', '".$email."', '".$facebook."')";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>
