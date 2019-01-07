<?php
	include("../../../php/conexion.php"); 
	$nombre=utf8_decode($_POST['titulo']);
	$tipo=$_POST['tipo'];
	//obtenemos el numero del libro
	if($tipo==1){//cuando tipo=1 quiere decir que  ese libro es una copia y tenemos que dar los datos del libro original
		$sql="SELECT * FROM libros  WHERE Titulo='".$nombre."' ORDER BY ID_TEMPORAL ASC ";
		$consulta=mysqli_query($conexion,$sql) or die("se murio la consulta");
		while($registro=mysqli_fetch_array($consulta)){
			echo $registro['No_Libro'];
			break;
		}
	}else{
		//obtenemos un nuevo numero de libro para darselo al nuevo libro (no es copia)
		$sql="SELECT * from contadores WHERE Id_Contador='1'";
		$consulta=mysqli_query($conexion,$sql);
		$registro=mysqli_fetch_array($consulta);
		echo $registro['Datos']+1;
	}
?>