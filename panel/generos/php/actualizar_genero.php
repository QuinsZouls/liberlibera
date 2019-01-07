<?php
include("../../../php/conexion.php");
$id=$_POST['Id_genero'];
$nombre=utf8_decode($_POST['Nombre_genero']);
$sql="UPDATE genero SET  Nombre='".$nombre."' WHERE Id_genero=".$id."";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>