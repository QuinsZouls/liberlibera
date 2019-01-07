<?php
	@ob_start();
	session_start();
?>
<?php
	include("../../../php/conexion.php");  
	setlocale(LC_ALL,"es_ES"); 
    date_default_timezone_set('America/Mexico_City'); 
    $id=$_POST['id'];
    $fecha_p = date("y-m-d");
    $fecha_e=$_POST['fecha'];
    $sql="UPDATE prestamos SET Aprobado='1', Fecha_prestamo='".$fecha_p."', Fecha_entrega='".$fecha_e."', Empleado_autoriza='".$_SESSION['id']."' WHERE Id_prestamo=".$id."";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
?>