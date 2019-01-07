<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM genero WHERE Id_genero='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>