<?php
	include("../../../php/conexion.php");
    require '../../../php/crypto.php';
	$id=$_POST['id'];
	$sql="SELECT * FROM libros WHERE ID_TEMPORAL='".$id."'";
	$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
	$datos=mysqli_fetch_array($consulta);
    echo '<script>
        var m=0;
        jQuery(document).ready(function($) {

             $("#subir1").on("submit",function(e) {
                e.preventDefault();
                jQuery.ajax({
                    url: "php/subir_imagen.php",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data){
                        $("#dir_portada2").val(data);
                    }
                });
                // body...
            });
    });
    </script>';
	echo '<div class="form-group">';

	echo '
		<label>Id_libro</label>
        <input type="text" class="form-control" value="'.$datos['ID_TEMPORAL'].'" id="id_libro">
        <label>T&iacute;tulo</label>
        <input type="text" class="form-control" value="'.utf8_encode($datos['Titulo']).'" id="titulo">
        <label>Autor</label>
        <select class="form-control" id="autor">
	';
	$sql="SELECT * FROM autor";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        if($datos['Autor']!=$registro['Id_autor'])echo'<option value="'.$registro['Id_autor'].'">'.utf8_encode($registro['Nombre']).'</option>';
        else echo'<option selected value="'.$registro['Id_autor'].'">'.utf8_encode($registro['Nombre']).'</option>';

    }
    echo "</select>";
    echo '
    	<label>N&uacute;mero de libro</label>
        <input type="text" class="form-control" value="'.$datos['No_Libro'].'" id="no_libro">
        <label>N&uacute;mero de copia</label>
        <input type="text" id="no_copia" class="form-control" value="'.$datos['No_Copia'].'">
        <label>Editorial</label>
        <select class="form-control" id="editorial">

    ';
    $sql="SELECT * FROM editorial";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        if($registro['Id_editorial']!=$datos['Editorial'])echo'<option value="'.$registro['Id_editorial'].'">'.utf8_encode($registro['Nombre_editorial']).'</option>';
        else echo'<option select value="'.$registro['Id_editorial'].'">'.utf8_encode($registro['Nombre_editorial']).'</option>';

    }
    echo "</select>";
    echo '
    	<label>N&uacute;mero de p&aacute;ginas</label>
        <input type="text" class="form-control" id="no_paginas" value="'.$datos['Numero_paginas'].'">
    ';
    echo'<label>Estado</label>
         <select class="form-control" id="estado">';
    if($datos['Estado']==1)echo '<option value="1" selected >Excelente</option>';
    else echo '<option value="1">Excelente</option>';
    if($datos['Estado']==2)echo '<option value="2" selected >Bueno</option>';
    else echo '<option value="2">Bueno</option>';
    if($datos['Estado']==3)echo '<option value="3" selected >Regular</option>';
    else echo '<option value="3">Regular</option>';
    echo '
    </select>
    	<label>Observaci&oacute;n</label>
        <textarea id="observacion" value="'.$datos['Observacion'].'" class="form-control"></textarea>
        <label>A&ntilde;o de edici&oacute;n </label>
        <input type="text" class="form-control" value="'.$datos['Ano_edicion'].'" id="ano_edicion">
        <label>G&eacute;nero</label>
        <select id="genero" class="form-control">
        
    ';
    $sql="SELECT * FROM genero";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        if($datos['Genero']!=$registro['Id_genero'])echo'<option value="'.$registro['Id_genero'].'">'.utf8_encode($registro['Nombre']).'</option>';
        else echo'<option selected value="'.$registro['Id_genero'].'">'.utf8_encode($registro['Nombre']).'</option>';

    }
    echo '
        </select>
        <label>Popularidad</label>
        <select id="popularidad" class="form-control">
    ';
    if($datos['Popularidad']==1) echo '<option selected value="1">Muy popular</option>';
    else echo '<option value="1">Muy popular</option>';
    if($datos['Popularidad']==2) echo '<option selected value="2">Popular</option>';
    else echo '<option value="2">Popular</option>';
    if($datos['Popularidad']==3) echo '<option selected value="3">Regular</option>';
    else echo '<option value="3">Regular</option>';
    if($datos['Popularidad']==4) echo '<option selected value="4">Poco popular</option>';
    else echo '<option value="4">Poco popular</option>';
    if($datos['Popularidad']==5) echo '<option selected value="5">Nada popular</option>';
    else echo '<option value="5">Nada popular</option>';
    echo '
    </select>
    	<label>Precio de reposici&oacute;n</label>
        <input type="text" class="form-control" aria-label="Amount" value="'.$datos['Precio_reposicion'].'" id="precio_reposicion">
        <label>Saga</label>
        <select class="form-control" id="saga">
    ';
    if($datos['Saga']==1)echo '<option selected value="1">Si</option>';
    else echo '<option value="1">Si</option>';
    if($datos['Saga']==0)echo '<option selected value="0">No</option>';
    else echo '<option value="0">No</option>';
    echo '</select>';

    echo '
    	<label>Nombre de la saga</label>
        <input type="text" id="nombre_saga" value="'.$datos['Nombre_saga'].'" class="form-control">
        <label>Forma de adquisici&oacute;n</label>
        <select id="forma_adquisicion" class="form-control">
    ';
    if($datos['Forma_adquisicion']==1) echo '<option value="1" selected>Donaci&oacute;n</option>';
    else echo '<option value="1">Donaci&oacute;n</option>';
    if($datos['Forma_adquisicion']==2) echo '<option value="2" selected>Adquirido por el club</option>';
    else echo '<option value="2">Adquirido por el club</option>';
    if($datos['Forma_adquisicion']==3) echo '<option selected value="3">Pago de multa</option>';
    else echo '<option value="3">Pago de multa</option>';
    if($datos['Forma_adquisicion']==4) echo '<option value="4" selected>Reposici&oacute;n</option>';
    else echo '<option value="4">Reposici&oacute;n</option>';
    echo '</select>';
    echo '
    	<label>Donador</label>
        <select id="donador" class="form-control">
    ';
    $sql="SELECT * FROM socios";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option selected value="'.$registro['Id_socio'].'">'.decrypt($registro['Nombre_completo'],$key).'</option>';

    }
    echo "</select>";
    echo '
    	<label>Fecha de alta</label>
        <input type="date" class="form-control" value="'.$datos['Fecha_alta'].'" id="fecha_alta">
        <label>Tipo</label>
        <select id="tipo" class="form-control">
    ';
    if($datos['Tipo']==1)echo '<option value="1" selected>Libro</option>';
    else echo '<option value="1">Libro</option>';
    if($datos['Tipo']==2)echo '<option value="2" selected>Manga</option>';
    else echo '<option value="2">Manga</option>';
    if($datos['Tipo']==3)echo '<option value="3" selected>Comic</option>';
    else echo '<option value="3">Comic</option>';
    if($datos['Tipo']==4)echo '<option value="4" selected>Revista</option>';
    else echo '<option value="4">Revista</option>';
    echo "</select>";
    echo '
    	<label>Inventario</label>
        <input type="text" class="form-control" value="'.$datos['Inventario'].'" id="inventario">

       
       <form enctype="multipart/form-data" id="subir1"  method="POST" accept-charset="utf-8">
            <label>Portada</label>
            <input type="file" name="file" class="form-control" id="portada2">
            <br>
            <input type="submit" value="Subir archivo" />
            <input type="text" class="form-control hide" value="'.$datos['Portada'].'" id="dir_portada2">
        </form>
    ';



	echo "</div>";
?>