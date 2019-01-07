<?php
    include("../../../php/conexion.php");
    $id=$_POST['Id_autor'];
    $nombre=utf8_decode($_POST['Nombre']);
    $nacionalidad=utf8_decode($_POST['Nacionalidad']);
    $nacimiento=$_POST['Nacimiento'];
    $muerte=$_POST['Muerte'];
    $sexo=$_POST['Sexo'];
    $sql="UPDATE autor SET Id_autor='".$id."' , Nombre='".$nombre."', Nacionalidad='".$nacionalidad."', Nacimiento='".$nacimiento."', Muerte='".$muerte."', Sexo='".$sexo."' WHERE autor.Id_autor=".$id."";
	$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>