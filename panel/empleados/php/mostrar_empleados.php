<?php
	include("../../../php/conexion.php");
	require '../../../php/crypto.php';
	$sql="SELECT * FROM empleado";
	$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
	while($registro=mysqli_fetch_array($consulta)){
		$sql="SELECT * FROM socios WHERE Id_socio=".$registro['Alumno']."";
		$consultas=mysqli_query($conexion,$sql) or die ("se murio la consulta");
		$alumno=mysqli_fetch_array($consultas);
		echo '
		<tr>
			<td>'.decrypt($alumno['Nombre_completo'],$key).'</td>
			<td>'.utf8_encode($registro['Cargo']).'</td>
			<td>'.utf8_encode($registro['Turno']).'</td>
			<td>'.utf8_encode($registro['Fecha_alta']).'</td>
			<td><a href="#" data-toggle="modal" data-target="#edit_empleado" id="editarempleado" data-id="'.$registro['Numero_empleado'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
			<td><a href="#" data-toggle="modal" data-target="#delete_empleado" id="borrarempleado" data-id="'.$registro['Numero_empleado'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
		</tr>
		';
	}
?>