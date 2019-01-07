<?php
	include("../../php/conexion.php");
	$codigo=str_replace(" ", "+", $_GET['cuenta']);
	$sql="UPDATE usuarios SET Activo='1' WHERE Email='".$codigo."'";
	$consulta=mysqli_query($conexion,$sql) or die("error").mysqli_error();
	if($consulta)header("Location: https://liberlibera.tk/login/");
	else echo "error interno";
?>