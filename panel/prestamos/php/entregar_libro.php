<?php
	include("../../../php/conexion.php");   
    $id=$_POST['id'];
    $ob=utf8_decode($_POST['observacion']);
    $socio="";
    if(!isset($_SESSION))session_start();
    if(isset($_SESSION['id']))
    	$socio=$_SESSION['id'];
    $sql="UPDATE prestamos SET Recibido='1', Empleado_recibe=".$socio.", Fecha_recibo='".date("y-m-d")."', Observacion='".$ob."' WHERE Id_prestamo=".$id."";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    $sql3="SELECT * FROM prestamos WHERE Id_prestamo=".$id."";
    $consul=mysqli_query($conexion,$sql3) or die("se murio la consulta2");
    $libro=mysqli_fetch_array($consul);
    $sql2="UPDATE libros SET Ocupado='0' WHERE ID_TEMPORAL=".$libro['Libro']."";
    $consulta2=mysqli_query($conexion,$sql2) or die ("se murio la consulta3");
?>