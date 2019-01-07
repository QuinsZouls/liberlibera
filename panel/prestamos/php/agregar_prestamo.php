<?php
    include("../../../php/conexion.php");  
    setlocale(LC_ALL,"es_ES"); 
    date_default_timezone_set('America/Mexico_City'); 
    $libro=$_POST['Libro'];
    $alumno=$_POST['Alumno'];
    $empleado=$_POST['Empleado'];
    $fecha_prestamo=$_POST['Fecha_prestamo'];
    $fecha_entrega=$_POST['Fecha_entrega'];
    $sql = "INSERT INTO prestamos (Libro, Alumno, Empleado_autoriza, Fecha_prestamo, Fecha_entrega, Recibido, Aprobado ) VALUES ('".$libro."', '".$alumno."','".$empleado."', '".$fecha_prestamo."', '".$fecha_entrega."', '0', '1')"; 
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    $sql2="UPDATE libros SET Ocupado='1' WHERE ID_TEMPORAL='".$libro."'";
    $consulta=mysqli_query($conexion,$sql2) or die ("se murio la consulta");

?>