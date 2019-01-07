<?php
	include ("../../../php/conexion.php");
	require '../../../php/crypto.php';
	//se carga el script para ser usado en toda la paginas una y otra vez
	echo '<script>
		var m=0;
		jQuery(document).ready(function($) {
			 $("#subir").on("submit",function(e) {
			 	e.preventDefault();
		        jQuery.ajax({
		            url: "php/subir_imagen.php",
		            data: new FormData(this),
		            cache: false,
		            contentType: false,
		            processData: false,
		            type: "POST",
		            success: function(data){
		                $("#dir_portadal").val(data);
		            }
		        });
		        // body...
		    });
			function obtener_portada(nombre) {
		        $.ajax({
		            type: "POST",
		            url: "php/obtener_portada.php",
		            data: {
		                titulo: nombre
		            },
		            success: function(data) {
		                $("#dir_portadal").val(data);
		            }
		        });
		        // body...
		    }
		    function obtener_nolibro(nombre, tipo) {
		        $.ajax({
		            type: "POST",
		            url: "php/obtener_nolibro.php",
		            data: {
		                titulo: nombre,
		                tipo: tipo
		            },
		            success: function(data) {
		                $("#no_librol").val(data);
		            }
		        });
		        // body...
		    }
		    function obtener_copia(nombre) {
		        $.ajax({
		            type: "POST",
		            url: "php/obtener_copia.php",
		            data: {
		                titulo: nombre
		            },
		            success: function(data) {
		                $("#no_copial").val(data);
		                if(data!="1"){
		                    po=1;
		                    obtener_nolibro(nombre,1);
		                    obtener_portada(nombre);
		                }else{
		                	po=0;
		                    obtener_nolibro(nombre,2);
		                }
		            }
		        });
		        // body...
		    }
		    
		    function multi_autor(n) {
		        // body...
		        $.ajax({
		            type: "POST",
		            url: "php/funautor.php",
		            data: {
		                n: n
		            },
		            dataType: "html",
		            success: function(data) {
		                $("#autores-contenedor").append(data);
		            }
		        });
		    }
		    $(document).on("click", "#add-autor", function() {
		        //m++;
		        multi_autor(m);
		    });
		    $("#autorl").change(function() {
		        obtener_copia($("#titulol").val());
		        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
		        $("#inventariol").val(cp);
		    });
		    $("#no_librol").change(function() {
		        obtener_copia($("#titulol").val());
		        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
		        $("#inventariol").val(cp);
		    });
		    $("#no_copial").change(function() {
		        obtener_copia($("#titulol").val());
		        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
		        $("#inventariol").val(cp);
		    });
		    $("#titulol").change(function() {
		        obtener_copia($("#titulol").val());
		       var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
		        $("#inventariol").val(cp);
		    });

		});
	</script>';
	echo '
		<label>T&iacute;tulo</label>
        <input type="text" class="form-control" id="titulol">
	';
	echo '
		<label>Autor</label>
		<select class="form-control" id="autorl">
	';
	$sql="SELECT * FROM autor";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    echo'<option value="0">Varios Autores</option>';
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option value="'.$registro['Id_autor'].'">'.utf8_encode($registro['Nombre']).'</option>';
    }
	echo '</select><br>';
	echo '<div id="autores-contenedor"></div>';
	echo '<a class="btn btn-primary" id="add-autor">Agregar otro autor</a><br>';
	echo '
		<label>N&uacute;mero de libro</label>
        <input type="text" class="form-control" id="no_librol">
        <label>N&uacute;mero de copia</label>
        <input type="text" id="no_copial" class="form-control">
        <label>Editorial</label>
        <select class="form-control" id="editoriall">
	';
	$sql="SELECT * FROM editorial";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option value="'.$registro['Id_editorial'].'">'.utf8_encode($registro['Nombre_editorial']).'</option>';
    }
    echo '</select>';
    echo '
    	<label>N&uacute;mero de p&aacute;ginas</label>
        <input type="text" class="form-control" value="0" id="no_paginasl">
        <label>Estado</label>
        <select class="form-control" id="estadol">
            <option value="1">Excelente</option>
            <option value="2">Bueno</option>
            <option value="3">Regular</option>
        </select>
        <label>Observaci&oacute;n</label>
        <textarea id="observacionl" class="form-control"></textarea>
        <label>A&ntilde;o de edici&oacute;n </label>
        <input type="text" class="form-control" id="ano_edicionl"l>
        <label>G&eacute;nero</label>
        <select class="form-control" id="generol">
    ';

    $sql="SELECT * FROM genero";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option value="'.$registro['Id_genero'].'">'.utf8_encode($registro['Nombre']).'</option>';
    }
    echo '
    	</select>
        <label>Popularidad</label>
        <select id="popularidadl" class="form-control">
            <option value="1">Muy popular</option>
            <option value="2">Popular</option>
            <option value="3">Regular</option>
            <option value="4">Poco popular</option>
            <option value="5">Nada popular</option>
        </select>
        <label>Precio de reposici&oacute;n</label>
        <input type="text" class="form-control" aria-label="Amount" value="0" id="precio_reposicionl">
        <label>Saga</label>
        <select class="form-control" id="sagal">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <label>Nombre de la saga</label>
        <input type="text" id="nombre_sagal" class="form-control">
        <label>Forma de adquisici&oacute;n</label>
        <select id="forma_adquisicionl" class="form-control">
            <option value="1">Donaci&oacute;n</option>
            <option value="2">Adquirido por el club</option>
            <option value="3">Pago de multa</option>
            <option value="4">Reposici&oacute;n</option>
        </select>
        <label>Donador</label>
        <select id="donadorl" class="form-control">
        	<option value="0">An&oacute;nimo</option>
    ';
    $sql="SELECT * FROM socios";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option value="'.$registro['Id_socios'].'">'.decrypt($registro['Nombre_completo'],$key).'</option>';
    }
    $date=date("Y-m-d");
    echo '
    	 </select>
        <label>Fecha de alta</label>
        <input type="date" class="form-control" id="fecha_altal" value="'.$date.'">
        <label>Tipo</label>
        <select id="tipol" class="form-control">
            <option value="1">Libro</option>
            <option value="2">Manga</option>
            <option value="3">Comic</option>
            <option value="4">Revista</option>
        </select>
        <label>Inventario</label>
        <input type="text" class="form-control" id="inventariol">
        <form enctype="multipart/form-data" id="subir"  method="POST" accept-charset="utf-8">
        	<label>Portada</label>
       		<input type="file" name="file" class="form-control" id="portadal">
       		<br>
       		<input type="submit" value="Subir archivo" />
        </form>
        <input type="text" class="form-control hide" id="dir_portadal">
        
    ';
?>