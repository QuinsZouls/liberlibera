<?php
	include("../../../php/conexion.php");
	$txt=utf8_decode($_POST['Nombre']);
	if(!$txt)  $sql="SELECT * FROM autor";
	else $sql="SELECT * FROM autor WHERE Nombre LIKE '%".$txt."%'";
	$consulta=mysqli_query($conexion,$sql) or die ("error 298klhd82");
	while($registro=mysqli_fetch_array($consulta)){
		echo '  
			<tr id="'.$registro['Id_autor'].'">
				<td>'.utf8_encode($registro['Id_autor']).'</td>
				<td>'.utf8_encode($registro['Nombre']).'</td>
                <td>'.utf8_encode($registro['Nacionalidad']).'</td>
                <td>'.utf8_encode($registro['Nacimiento']).'</td>
                <td>'.utf8_encode($registro['Muerte']).'</td>';
        if($registro['Sexo']==1)echo'<td>Hombre</td>';
        else echo'<td>Mujer</td>';

		echo'
				<td><a href="#" data-toggle="modal" data-target="#editautor" id="editarautor" data-id="'.$registro['Id_autor'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
				<td><a href="#" data-toggle="modal" data-target="#delete_autor" id="borrarautor" data-id="'.$registro['Id_autor'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
			</tr>';
	}
?>