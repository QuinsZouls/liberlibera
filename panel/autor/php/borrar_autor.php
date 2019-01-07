<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM autor WHERE Id_autor='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>