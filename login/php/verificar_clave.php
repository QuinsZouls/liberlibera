<?php
	include("../../php/conexion.php");
	require '../../php/crypto.php';
	$clave=$_POST['Clave'];
  $estado=0;
	$sql="SELECT * FROM socios WHERE Id_socio='".$clave."'";
	$consulta=mysqli_query($conexion,$sql) or die("error vf981323");
	$registro=mysqli_num_rows($consulta);
  if($registro==1)
    $estado=1;
  $sql2="SELECT * FROM usuarios WHERE Id_socio='".$clave."'";
	$consulta2=mysqli_query($conexion,$sql2) or die("error vf981323");
	$registro2=mysqli_num_rows($consulta2);
  if($registro2==1)
    $estado=2;
	echo $estado; //0 si no existe la clave, 1 si existe la clave y no esta siendo usada, 2 si existe la clave y esta siendo usada
?>
