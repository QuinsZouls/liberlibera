<?php
	include("../../../php/conexion.php"); 
	$ruta="../../../images/libros/";
    $ruta=$ruta.basename($_FILES['file']['name']);
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $ruta)) { 
        echo "Ha ocurrido un error, trate de nuevo!";
    }else{
    	echo "images/libros/". basename( $_FILES['file']['name']);
    }
?>