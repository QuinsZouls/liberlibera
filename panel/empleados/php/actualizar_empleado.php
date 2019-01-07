<?php
include("../../../php/conexion.php");
$id=$_POST['Numero_empleado'];
$alumno=$_POST['Alumno'];
$cargo=utf8_decode($_POST['Cargo']);
$turno=$_POST['Turno'];
$fecha=$_POST['Fecha_alta'];
$sql="UPDATE empleado SET  Alumno=".$alumno.", Cargo='".$cargo."', Turno='".$turno."', Fecha_alta='".$fecha."' WHERE Numero_empleado=".$id." ";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>