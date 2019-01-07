<?php
	include("../../../php/conexion.php");   
    $id=$_POST['id'];
    $fecha_e=$_POST['fecha'];
    $fecha_p=date("Y-m-d");
    echo $id;
    $sql="UPDATE prestamos SET Fecha_entrega='".$fecha_e."', Fecha_prestamo='".$fecha_p."' WHERE Id_prestamo=".$id."";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>