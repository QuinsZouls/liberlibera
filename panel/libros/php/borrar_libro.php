<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM libros WHERE ID_TEMPORAL='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");

?>