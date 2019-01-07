<?php
	include("../../../php/conexion.php"); 
	$nombre=$_POST['titulo'];
	$sql="SELECT * FROM libros WHERE Titulo='".$nombre."' ";
	$consulta=mysqli_query($conexion,$sql);
	$registro=mysqli_fetch_array($consulta);
	echo $registro['Portada'];
?>