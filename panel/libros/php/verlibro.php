<?php
	include("../../../php/conexion.php");
	$id=$_POST['id'];
	$sql="SELECT * FROM libros WHERE ID_TEMPORAL='".$id."'";
	$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
	$datos=mysqli_fetch_array($consulta);
	echo '<div class="list-group">';
	echo '<div class="item-book"><h3>T&iacutetulo:</h3><p><h4>'.utf8_encode($datos['Titulo']).'</h4></p></div>';
	$sql2="SELECT * FROM autor WHERE Id_autor='".$datos['Autor']."'";
	$autor=mysqli_query($conexion,$sql2)or die("error");
	$datos_autor=mysqli_fetch_array($autor);
	if($datos['Autor']!=0)echo '<div class="item-book"><h3>Autor:</h3><p><h4>'.utf8_encode($datos_autor['Nombre']).'</h4></p></div>';
	else{
		echo '<div class="item-book"><h3>Varios Autores</h3></div>';
	}
	if($datos['Autor']==0){
		$autores=json_decode(utf8_encode($datos['Multi_autor']));
		$i=0;
		while($autores->{'Autores'}[$i]){
			try{
				$id=$autores->{'Autores'}[$i]->{'Id_autor'};
				$col=$autores->{'Autores'}[$i]->{'colaboracion'};
				$sql2="SELECT * FROM autor WHERE Id_autor='".$id."'";
				$autor=mysqli_query($conexion,$sql2)or die("error");
				$datos_autor=mysqli_fetch_array($autor);
				echo '<div class="item-book"><h3>Autor '.($i+1).':</h3><p><h4>'.utf8_encode($datos_autor['Nombre']).'</h4></p></div>';
				echo '<div class="item-book"><h3>Colaboraci&oacuten :</h3><p><h4>'.utf8_encode($col).'</h4></p></div>';
			}catch( Exception  $e){

			}
			
			$i++;
		}
		
	}
	$sql3="SELECT Nombre_editorial FROM editorial WHERE Id_editorial='".$datos['Editorial']."'";
	$editorial=mysqli_query($conexion,$sql3) or die("error 2");
	$datos_editorial=mysqli_fetch_array($editorial);
	echo '<div class="item-book"><h3>Editorial:</h3><p><h4>'.utf8_encode($datos_editorial['Nombre_editorial']).'</h4></p></div>';
	echo '<div class="item-book"><h3>N&uacute;mero de p&aacute;ginas:</h3><p><h4>'.utf8_encode($datos['Numero_paginas']).'</h4></p></div>';
	switch ($datos['Estado']) {
		case '1':
			echo '<div class="item-book"><h3>Estado:</h3><p><h4>Excelente</h4></p></div>';
			break;
		case '2':
			echo '<div class="item-book"><h3>Estado:</h3><p><h4>Bueno</h4></p></div>';
			break;
		case '3':
			echo '<div class="item-book"><h3>Estado:</h3><p><h4>Regular</h4></p></div>';
			break;
		default:
			# code...
			break;
	}
	echo '<div class="item-book"><h3>Observaci&oacute;n:</h3><p><h4>'.utf8_encode($datos['Observacion']).'</h4></p></div>';
	echo '<div class="item-book"><h3>A&ntilde;o de edici&oacute;n:</h3><p><h4>'.utf8_encode($datos['Ano_edicion']).'</h4></p></div>';
	
	$sql2="SELECT * FROM genero WHERE Id_genero='".$datos['Genero']."'";
	$genero=mysqli_query($conexion,$sql2)or die("error");
	$datos_genero=mysqli_fetch_array($genero);
	echo '<div class="item-book"><h3>G&eacute;nero:</h3><p><h4>'.utf8_encode($datos_genero['Nombre']).'</h4></p></div>';
	/**if($datos['Multi_autor']!=null){
		echo '<div class="item-book"><h3>Multi-Autor:</h3><p><h4>'.utf8_encode($datos['Multi-autor']).'</h4></p></div>';
	}**/
	switch ($datos['Popularidad']) {
		case '1':
			echo '<div class="item-book"><h3>Popularidad:</h3><p><h4>Muy popular</h4></p></div>';
			break;
		case '2':
			echo '<div class="item-book"><h3>Popularidad:</h3><p><h4>Popular</h4></p></div>';
			break;
		case '3':
			echo '<div class="item-book"><h3>Popularidad:</h3><p><h4>Regular</h4></p></div>';
			break;
		case '4':
			echo '<div class="item-book"><h3>Popularidad:</h3><p><h4>Poco popular</h4></p></div>';
			break;
		default:
			echo '<div class="item-book"><h3>Popularidad:</h3><p><h4>Nada popular</h4></p></div>';
			break;
	}
	echo '<div class="item-book"><h3>Precio de reposici&oacute;n:</h3><p><h4>'.$datos['Precio_reposicion'].'</h4></p></div>';
	if($datos['Saga']){
		echo '<div class="item-book"><h3>Saga:</h3><p><h4>Si</h4></p></div>';
		echo '<div class="item-book"><h3>Nombre de saga:</h3><p><h4>'.utf8_encode($datos['Nombre_saga']).'</h4></p></div>';
	}else{
		echo '<div class="item-book"><h3>Saga:</h3><p><h4>No</h4></p></div>';
	}
	switch ($datos['Forma_adquisicion']) {
		case '1':
			echo '<div class="item-book"><h3>Forma de Adquisicion:</h3><p><h4>Donacion</h4></p></div>';
			$sql4="SELECT * FROM socios WHERE Id_socio='".$datos['Donador']."'";
			$donador=mysqli_query($conexion,$sql4);
			$datos_donador=mysqli_fetch_array($donador);
			echo '<div class="item-book"><h3>Donador:</h3><p><h4>'.utf8_encode($datos_donador['Nombre_completo']).'</h4></p></div>';
			break;
		case '2':
			echo '<div class="item-book"><h3>Forma de Adquisicion:</h3><p><h4>Adquirido por el club</h4></p></div>';
			break;
		case '3':
			echo '<div class="item-book"><h3>Forma de Adquisicion:</h3><p><h4>Pago de multa</h4></p></div>';
			break;
		case '4':
			echo '<div class="item-book"><h3>Forma de Adquisicion:</h3><p><h4>Reposici&oacuten;</h4></p></div>';
			break;
		default:
			# code...
			break;
	}

	echo '<div class="item-book"><h3>Fecha de alta:</h3><p><h4>'.utf8_encode($datos['Fecha_alta']).'</h4></p></div>';
	echo '<div class="item-book"><h3>N&uacute;mero de copia:</h3><p><h4>'.utf8_encode($datos['No_Copia']).'</h4></p></div>';
	echo '<div class="item-book"><h3>N&uacute;mero de libro:</h3><p><h4>'.utf8_encode($datos['No_Libro']).'</h4></p></div>';
	if($datos['Ocupado'])
		echo '<div class="item-book"><h3>Disponibilidad:</h3><p><h4>Ocupado por: </h4></p></div>';
	else
		echo '<div class="item-book"><h3>Disponibilidad:</h3><p><h4>Disponible</h4></p></div>';
	switch ($datos['Tipo']) {
		case 1:
			echo '<div class="item-book"><h3>Tipo:</h3><p><h4>Libro</h4></p></div>';
			break;
		case 2:
			echo '<div class="item-book"><h3>Tipo:</h3><p><h4>Manga</h4></p></div>';
			break;
		case 3:
			echo '<div class="item-book"><h3>Tipo:</h3><p><h4>Comic</h4></p></div>';
			break;
	}
	
?>
