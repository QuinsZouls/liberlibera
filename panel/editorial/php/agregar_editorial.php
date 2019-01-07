<?php
include("../../../php/conexion.php");
$id=$_POST['Id_editorial'];
$editorial=utf8_decode($_POST['Nombre_editorial']);
$sql="INSERT INTO editorial(Nombre_editorial) VALUES('".$editorial."')";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
?>