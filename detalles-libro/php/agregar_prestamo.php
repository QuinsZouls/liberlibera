<?php
	@ob_start();
	session_start();
?>
<?php
    include("../../php/conexion.php");  
    setlocale(LC_ALL,"es_ES"); 
    date_default_timezone_set('America/Mexico_City'); 
    $libro=$_POST['Libro'];
    $alumno=$_SESSION['id'];
    $sql = "INSERT INTO prestamos (Libro, Alumno, Recibido, Aprobado ) VALUES ('".$libro."', '".$alumno."', '0', '0')"; 
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    $sql2="UPDATE libros SET Ocupado='1' WHERE ID_TEMPORAL='".$libro."'";
    $consulta=mysqli_query($conexion,$sql2) or die ("se murio la consulta");

?>