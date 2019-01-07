<?php
	$ruta="../../../../../blog/asset/img/";
    $ruta=$ruta.basename($_FILES['file']['name']);
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $ruta)) { 
        echo "Ha ocurrido un error, trate de nuevo!";
    }else{
    	echo "asset/img/".basename($_FILES['file']['name']);
    }
?>