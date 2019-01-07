<?php
	include("../../php/conexion.php");
	require '../../php/crypto.php';
	$email=encrypt($_POST['Email'],$key);
	$sql="SELECT * FROM usuarios WHERE Email='".$email."'";
	$consulta=mysqli_query($conexion,$sql) or die("error vf981323");
	$registro=mysqli_num_rows($consulta);
	echo $registro;
?>