<?php
	include("../../../php/conexion.php");
	require'../../../php/crypto.php';
	$sql="SELECT * FROM socios";
	$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
	while($registro=mysqli_fetch_array($consulta)){
		if($registro['Alumno']){
			echo '
				<tr id="'.$registro['Id_socio'].'">
					<td>'.$registro['Id_socio'].'</td>
					<td>'.decrypt(utf8_encode($registro['Nombre_completo']),$key).'</td>
	                ';
	                if(decrypt($registro['Sexo'],$key)){
	                	echo '<td>Masculino</td>';
	                }else{
	                	echo '<td>Femenino</td>';
	                }
	                if($registro['Alumno'])echo '<td>Si</td>';
	                else echo '<td>No</td>';
	        echo '
	        		<td>'.decrypt(utf8_encode($registro['Grado']),$key).'</td>
	                ';
	        switch (decrypt(utf8_encode($registro['Grupo']),$key)) {
	        	case '1':
	        		echo "<td>BM</td>";
	        		break;
	        	case '2':
	        		echo "<td>AM</td>";
	        		break;
	        	case '3':
	        		echo "<td>AMBI</td>";
	        		break;
	        	case '4':
	        		# code...
	        		echo "<td>AV</td>";
	        		break;
	        	default:
	        		echo "<td>BV</td>";
	        		# code...
	        		break;
	        }
	        switch (decrypt(utf8_encode($registro['Especialidad']),$key)) {
	        	case '1':
	        		# code...
	        		echo "<td>Proceso de gesti&oacute;n</td>";
	        		break;
	        	case '2':
	        		echo "<td>Eelectr&oacute;nica</td>";
	        		# code...
	        		break;
	        	case '3':
	        		echo "<td>Mantenimiento</td>";
	        		# code...
	        		break;
	        	case '4':
	        		echo "<td>Mecatr&oacute;nica</td>";
	        		# code...
	        		break;
	        	case '5':
	        		echo "<td>Pl&aacute;sticos</td>";
	        		# code...
	        		break;
	        	default:
	        		echo "<td>Programaci&oacute;n</td>";
	        		# code...
	        		break;
	        }
	        if(decrypt($registro['Turno'],$key)==1)echo '<td>Matutino</td>';
	        else echo '<td>Vespertino</td>';
	        echo '
	        		<td>'.decrypt(utf8_encode($registro['No_control']),$key).'</td>
	                <td>'.utf8_encode($registro['Fecha_de_nacimiento']).'</td>
	                <td>'.decrypt(utf8_encode($registro['Email']),$key).'</td>
	                <td>'.decrypt(utf8_encode($registro['Facebook']),$key).'</td>
					<td><a href="#" data-toggle="modal" data-target="#edit_socio" id="editarsocio" data-id="'.$registro['Id_socio'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
					<td><a href="#" data-toggle="modal" data-target="#delete_socio" id="borrarsocio" data-id="'.$registro['Id_socio'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
				</tr>
	        ';
		}else{
			echo '
				<tr id="'.$registro['Id_socio'].'">
					<td>'.$registro['Id_socio'].'</td>
					<td>'.decrypt(utf8_encode($registro['Nombre_completo']),$key).'</td>
	                ';
	                if(decrypt($registro['Sexo'],$key)){
	                	echo '<td>Masculino</td>';
	                }else{
	                	echo '<td>Femenino</td>';
	                }
	                if($registro['Alumno'])echo '<td>Si</td>';
	                else echo '<td>No</td>';
	        echo '
	        		<td>N/A</td>
	            <td>N/A</td>
	            <td>N/A</td>
	                ';
	        echo '<td>N/A</td>';
	        echo '
	        		<td>N/A</td>
	                <td>'.utf8_encode($registro['Fecha_de_nacimiento']).'</td>
	                <td>'.decrypt(utf8_encode($registro['Email']),$key).'</td>
	                <td>'.decrypt(utf8_encode($registro['Facebook']),$key).'</td>
					<td><a href="#" data-toggle="modal" data-target="#edit_socio" id="editarsocio" data-id="'.$registro['Id_socio'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
					<td><a href="#" data-toggle="modal" data-target="#delete_socio" id="borrarsocio" data-id="'.$registro['Id_socio'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
				</tr>
	        ';
		}

	}
?>
