<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM empleado WHERE Numero_empleado=".$id."";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>