<?php
	include("../../../php/conexion.php");
	require('../../../php/crypto.php');
	$indice=$_POST['index'];
	$sql="SELECT * FROM usuarios WHERE Activo=".$indice."";
	$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
	while($registro=mysqli_fetch_array($consulta)){
		echo "<tr>";
		echo "<td>".decrypt(utf8_encode($registro['Email']),$key)."</td>";
		echo "<td>".decrypt(utf8_encode($registro['Nombre']),$key)."</td>";
		echo "<td>".decrypt(utf8_encode($registro['Apellidos']),$key)."</td>";
		echo "<td>".decrypt(utf8_encode($registro['Grupo']),$key)."</td>";
		echo "<td>".utf8_encode($registro['Fecha_Nacimiento'])."</td>";
		if(!$registro['Activo'])
			echo "<td>Inactivo</td>";
		else
			echo "<td>Activo</td>";
		if(!$registro['Id_socio'])
			echo "<td>sin socio</td>";
		else 
			echo "<td>Socio activo</td>";
		if($registro['Tipo_Usuario']==1)
			echo "<td>Administrador</td>";
		else
			echo "<td>Socio</td>";
		if($registro['Tipo_Usuario']==2)
			echo "<td><a href='#' id='admin' data-id='".$registro['Email']."'>Nombrar Administrador</a></td>";
		else 
			echo"<td><a href='#' id='quitar_admin' data-id='".$registro['Email']."'>Eliminar Administrador</a><td>";
		if($registro['Activo'])echo "<td><a href='#' id='desactivar' data-id='".$registro['Email']."'>Desactivar</a></td>";
		else echo "<td><a href='#' id='activar' data-id='".$registro['Email']."'>Activar</a></td>";
		echo"</tr>";

	}
?>