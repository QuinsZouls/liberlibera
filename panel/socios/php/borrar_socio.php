<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM socios WHERE Id_socio='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>