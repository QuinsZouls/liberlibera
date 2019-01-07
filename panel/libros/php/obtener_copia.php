<?php
	include("../../../php/conexion.php"); 
	$nombre=utf8_decode($_POST['titulo']);
	$sql="SELECT * FROM libros WHERE Titulo='".$nombre."' ";
	$consulta=mysqli_query($conexion,$sql);
	$registro=mysqli_num_rows($consulta);
	echo $registro+1;
?>