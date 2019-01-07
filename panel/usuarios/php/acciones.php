<?php
	include("../../../php/conexion.php");
	$tipo=$_POST["tipo"];
	$id=$_POST['id'];
	switch ($tipo) {
		case '1':
			$sql="UPDATE usuarios SET Activo='1' WHERE Email='".$id."'";
			$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
			# activar
			break;
		case '2':
			$sql="UPDATE usuarios SET Activo='0' WHERE Email='".$id."'";
			$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
			# desactivar
			break;
		case '3':
			$sql="UPDATE usuarios SET Tipo_Usuario='1' WHERE Email='".$id."'";
			$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
			# admin
			break;
		case '4':
			$sql="UPDATE usuarios SET Tipo_Usuario='2' WHERE Email='".$id."'";
			$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
			#quitar admin
			break;
		default:
			# code...
			break;
	}
?>