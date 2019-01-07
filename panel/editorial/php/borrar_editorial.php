<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="DELETE  FROM editorial WHERE Id_editorial='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>