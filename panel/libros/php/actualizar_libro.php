<?php
	//include("../../../php/conexion.php");  
    require("../../asset/php/conn.php"); 
    $id=$_POST['ID_TEMPORAL'];
    $inventario=$_POST['Inventario'];
    $titulo=utf8_decode($_POST['Titulo']);
    $multi_autor=$_POST['Multi_autor'];
    $autor=$_POST['Autor'];
    $editorial=$_POST['Editorial'];
    $no_paginas=$_POST['Numero_paginas'];
    $estado=$_POST['Estado'];
    $observacion=utf8_decode($_POST['Observacion']);
    $ano_edicion=$_POST['Ano_edicion'];
    $genero=utf8_decode($_POST['Genero']);
    $popularidad=$_POST['Popularidad'];
    $precio=$_POST['Precio'];
    $saga=$_POST['Saga'];
    $nombre_saga=utf8_decode($_POST['Nombre_saga']);
    $forma_ad=$_POST['Forma_adquisicion'];
    $donador=$_POST['Donador'];
    $fecha_alta=$_POST['Fecha_alta'];
    $no_copia=$_POST['No_Copia'];
    $no_libro=$_POST['No_Libro'];
   	$ocupado=$_POST['Ocupado'];
    $tipo=$_POST['Tipo'];
    $portada=$_POST['Portada'];
    $sql="UPDATE libros SET Inventario='".$inventario."', Titulo='".$titulo."', Multi_autor='".$multi_autor."', Autor='".$autor."' , Editorial='".$editorial."', Numero_paginas='".$no_paginas."',  Estado='".$estado."', Observacion='".$observacion."', Ano_edicion='".$ano_edicion."', Genero='".$genero."', Popularidad='".$popularidad."', Precio_reposicion='".$precio."', Saga='".$saga."', Nombre_saga='".$nombre_saga."', Forma_adquisicion='".$forma_ad."', Donador='".$donador."', Fecha_alta='".$fecha_alta."', No_Copia='".$no_copia."', No_Libro='".$no_libro."', Ocupado='".$ocupado."', Tipo='".$tipo."', Portada='".$portada."' WHERE ID_TEMPORAL='".$id."' ";
    //$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    /**$servername = "localhost";
    $username = "liberlib_sql";
    $password = "S5_c[!2toM]";
    $dbname = "liberlib_liberlibera";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "liberlibera";**/

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    if (!$conn->query($sql)) {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>