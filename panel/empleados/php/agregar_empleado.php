<?php
include("../../../php/conexion.php");
$id=$_POST['Numero_empleado'];
$alumno=$_POST['Alumno'];
$cargo=utf8_decode($_POST['Cargo']);
$turno=$_POST['Turno'];
$fecha=$_POST['Fecha_alta'];
$sql="INSERT INTO empleado ( Alumno, Cargo, Turno, Fecha_alta) VALUES ('".$alumno."', '".$cargo."', '".$turno."', '".$fecha."')";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>