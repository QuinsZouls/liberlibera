<?php
    include("../../php/conexion.php");  
    setlocale(LC_ALL,"es_ES"); 
    date_default_timezone_set('America/Mexico_City');
    $txt=utf8_decode($_POST['texto']);
    $rating=$_POST['rating'];
    $id_libro=$_POST['id'];
    if(!isset($_SESSION))session_start();
    $usuario=$_SESSION['id'];
    $fecha=date("y-m-d");
    $hora=date("g:ia");
    $sql = "INSERT INTO comentarios (Id_libro, Id_usuario, Texto, Fecha, Hora, Rating ) VALUES ('".$id_libro."', '".$usuario."', '".$txt."', '".$fecha."', '".$hora."', '".$rating."')"; 
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");

?>