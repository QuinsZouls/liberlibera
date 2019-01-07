<?php
	include('../../php/conexion.php');
	require '../../php/crypto.php';
	$id=$_POST['libro'];
	$sql="SELECT * FROM comentarios WHERE Id_libro='".$id."'";
	$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
	while($datos=mysqli_fetch_array($consulta)){
		$sql2="SELECT Nombre_completo FROM socios WHERE Id_socio=".$datos['Id_usuario']."";
		$consulta2=mysqli_query($conexion,$sql2) or die("error en la consulta 2");
		$usuario=mysqli_fetch_array($consulta2);
		$datos['Id_usuario']=decrypt($usuario['Nombre_completo'],$key);
		echo"<div class='comentario'>";
		echo '
			<ul>
				<li><a href=""><i class="fa fa-user"></i>'.$datos['Id_usuario'].'</a></li>
				<li><a href=""><i class="fa fa-clock-o"></i>'.$datos['Hora'].'</a></li>
				<li><a href=""><i class="fa fa-calendar-o"></i>'.$datos['Fecha'].'</a></li>
			</ul>
		';
		echo "<p>".utf8_encode($datos['Texto'])."</p><hr>";
		echo "</div>";
	}
?>