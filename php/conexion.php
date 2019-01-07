<?php
	$base="liberlibera";
	$server="localhost";
	$user="root";
	$pass="";
	$conexion=mysqli_connect($server,$user,$pass) or die("se murio el servidor");
	$db=mysqli_select_db($conexion,$base) or die("no se encontro la db").mysqli_error();

?>
