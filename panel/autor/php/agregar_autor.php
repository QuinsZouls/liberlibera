<?php
    include("../../../php/conexion.php");   
    $id=$_POST['Id_autor'];
    $nombre=utf8_decode($_POST['Nombre']);
    $nacionalidad=utf8_decode($_POST['Nacionalidad']);
    $nacimiento=$_POST['Nacimiento'];
    $muerte=$_POST['Muerte'];
    $sexo=$_POST['Sexo'];
    $sql = "INSERT INTO autor (Id_autor, Nombre, Nacionalidad, Nacimiento, Muerte, Sexo) VALUES ('".$id."', '".$nombre."','".$nacionalidad."', '".$nacimiento."', '".$muerte."', '".$sexo."')"; 
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");


?>