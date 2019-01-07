<?php
	include("conexion.php");
	$sql="SELECT * FROM libros";
	$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
	while($registro=mysqli_fetch_array($consulta)){
		echo '  
			<tr id="'.$registro['No_Libro'].'">
				<td>'.utf8_encode($registro['No_Libro']).'</td>
				<td>'.utf8_encode($registro['Titulo']).'</td>
				
		';
		$sql="SELECT * FROM autor WHERE Id_autor=".$registro['Autor']."";
		$autor=mysqli_query($conexion,$sql);
		$datos_autor=mysqli_fetch_array($autor);
		echo'
				<td>'.utf8_encode($datos_autor['Nombre']).' '.utf8_encode($datos_autor['Apellido_paterno']).' '.utf8_encode($datos_autor['Apellido_materno']).'</td>
		';
		$sql="SELECT * FROM genero WHERE Id_Genero=".$registro['Genero']."";
		$genero=mysqli_query($conexion,$sql);
		$datos_genero=mysqli_fetch_array($genero);
		echo '
				<td>'.utf8_encode($datos_genero['Genero']).'</td>
		';
		switch ($registro["Tipo"]) {
			case 1:
				# code...
				echo '<td>Libro</td>';
				break;
			case 2:
				echo '<td>Manga</td>';
				break;
			case 3:
				echo '<td>Comic</td>';
				break;
			default:
				# code...
				break;
		}
		echo '
				<td>'.utf8_encode($registro['Inventario']).'</td>
		';
		if($registro['Ocupado']=='0'){
			echo '<td><i class="fas fa-check text-success"></i> Disponible</td>';
		}else{
			echo '<td><i class="fas fa-times text-danger"></i> Ocupado por </td>';
		}
		echo '
				<td><a href="#" data-toggle="modal" data-target="#verlibro" id="viewbook" data-id="'.$registro['No_Libro'].'"><i class="far fa-eye text-primary"></i></a></td>>
				<td><a href="#" data-toggle="modal" data-target="#editbook"><i class="fas fa-pencil-alt text-warning"></i></td>
				<td><a href="#" data-toggle="modal" data-target="#deletebook" id="borrarlibro" data-id="'.$registro['No_Libro'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
			</tr>';
	}
?>