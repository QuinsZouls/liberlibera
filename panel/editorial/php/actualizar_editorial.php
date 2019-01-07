<?php
include("../../../php/conexion.php");
$id=$_POST['Id_editorial'];
$nombre=utf8_decode($_POST['Nombre_editorial']);
$sql="UPDATE editorial SET  Nombre_editorial='".$nombre."' WHERE Id_editorial=".$id."";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>