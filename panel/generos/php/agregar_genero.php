<?php
include("../../../php/conexion.php");
$id=$_POST['Id_genero'];
$genero=utf8_decode($_POST['Nombre_genero']);
$sql="INSERT INTO genero(Nombre) VALUES('".$genero."')";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>