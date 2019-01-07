<?php
    include("../../../php/conexion.php"); 
    require("../../asset/php/conn.php"); 
    $inventario=$_POST['Inventario'];
    $titulo=utf8_decode($_POST['Titulo']);
    $multi_autor=utf8_decode($_POST['Multi_autor']);
    $autor=$_POST['Autor'];
    $editorial=$_POST['Editorial'];
    $no_paginas=$_POST['Numero_paginas'];
    $estado=$_POST['Estado'];
    $observacion=utf8_decode($_POST['Observacion']);
    $ano_edicion=$_POST['Ano_edicion'];
    $genero=$_POST['Genero'];
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
    //verificamos si el numero del libro existe, si existe quiere decir que es una copia y por ende no aumentarermos el contador de libros
    $sql="SELECT count(*) AS ID_TEMPORAL FROM libros WHERE No_Libro='".$no_libro."'";
    $consulta=mysqli_query($conexion,$sql);
    $registro=mysqli_fetch_assoc($consulta);
    $libros=$registro['ID_TEMPORAL'];
    if($libros==0){//si el numero no existe se suma otro libro al contador
        $sql="SELECT * FROM contadores WHERE Id_Contador='1'";
        $consulta=mysqli_query($conexion,$sql);
        $registro=mysqli_fetch_array($consulta);
        $libros=$registro['Datos']+1;
        $sql="UPDATE contadores SET Datos='".$libros."' WHERE Id_Contador='1'";
        $consulta=mysqli_query($conexion,$sql);
    }
    //subir imagen al servidor
    
    
    

    $sql="INSERT INTO libros( Inventario ,Titulo, Multi_autor, Autor, Editorial, Numero_paginas, Estado, Observacion, Ano_edicion, Genero,Popularidad, Precio_reposicion, Saga, Nombre_saga, Forma_adquisicion, Donador, Fecha_alta, No_Copia, No_Libro,Ocupado, Tipo, Portada) VALUES ('".$inventario."', '".$titulo."', '".$multi_autor."', '".$autor."', '".$editorial."', '".$no_paginas."', '".$estado."', '".$observacion."', '".$ano_edicion."', '".$genero."', '".$popularidad."', '".$precio."', '".$saga."', '".$nombre_saga."', '".$forma_ad."', '".$donador."', '".$fecha_alta."', '".$no_copia."', '".$no_libro."', '".$ocupado."', '".$tipo."', '".$portada."')";
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