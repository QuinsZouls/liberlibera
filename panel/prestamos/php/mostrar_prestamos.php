<?php
	include("../../../php/conexion.php");
	require '../../../php/crypto.php';
	$index=$_POST['index'];
	$sql="SELECT * FROM prestamos WHERE Aprobado=".$index."";
	$consulta=mysqli_query($conexion,$sql) or die("ERROR A1");
	while($registro=mysqli_fetch_array($consulta)){
		$sql2="SELECT * FROM libros WHERE ID_TEMPORAL='".$registro['Libro']."'";
		$consulta2=mysqli_query($conexion,$sql2) or die("ERROR SLM01");
		$libro=mysqli_fetch_array($consulta2);
		echo '
			<tr>
				<td>'.utf8_encode($libro['Titulo']).'</td>
		';
		$sql3="SELECT * FROM socios WHERE Id_socio='".$registro['Alumno']."'";
		$consulta3=mysqli_query($conexion,$sql3) or die("ERROR SLM02");
		$socio=mysqli_fetch_array($consulta3);
		echo '<td>'.decrypt($socio['Nombre_completo'],$key).'</td>';
		$sql4="SELECT * FROM empleado WHERE Numero_empleado='".$registro['Empleado_autoriza']."'";
		$consulta4=mysqli_query($conexion,$sql4) or die("ERROR SLM03");
		$empleado=mysqli_fetch_array($consulta4);
		$sql6="SELECT * FROM socios WHERE Id_socio=".$registro['Empleado_autoriza']."";
		$consulta6=mysqli_query($conexion,$sql6);
		$Empleado_autoriza=mysqli_fetch_array($consulta6);
		echo "<td>".decrypt($Empleado_autoriza['Nombre_completo'],$key)."</td>";
		echo "<td>".$registro['Fecha_prestamo']."</td>";
		echo "<td>".$registro['Fecha_entrega']."</td>";
		if($registro['Recibido']=='1'){
			echo "<td>Si</td>";
			$sql5="SELECT * FROM socios WHERE Id_socio=".$registro['Empleado_recibe']."";
			$consulta5=mysqli_query($conexion,$sql5);
			$Empleado_recibe=mysqli_fetch_array($consulta5);
			echo "<td>".decrypt($Empleado_recibe['Nombre_completo'],$key)."</td>";
			echo "<td>".$registro['Fecha_recibo']."</td>";
		}
		else{
			echo "<td>No</td>";
			echo "<td>N/A</td>";
			echo "<td>No entregado</td>";
		}
		if(!$registro['Observacion'])
			echo "<td>Ninguna</td>";
		else
			echo "<td>".utf8_encode($registro['Observacion'])."</td>";
		if($registro['Aprobado']==1) 
			echo "<td>Si</td>";
		else
			echo "<td>No</td>";
		echo '        
			<td><a href="#" id="renovarP" data-toggle="modal" data-target="#renovarPrestamo" data-id="'.$registro['Id_prestamo'].'"><i class="fas fa-align-justify"></i></a></td>
			 <td><a href="#" data-toggle="modal" data-target="#edit_prestamo" id="editarprestamo" data-id="'.$registro['Id_prestamo'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
            <td><a href="#" data-toggle="modal" data-target="#delete_prestamo" id="borrarprestamo" data-id="'.$registro['Id_prestamo'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
		';
		echo "</tr>";
	}
?>