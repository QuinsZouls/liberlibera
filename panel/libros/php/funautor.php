<?php
    include ("../../../php/conexion.php");
    $indice=$_POST['n'];
    $sql="SELECT * FROM autor";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    echo '<label>Autor '.($indice+1).'</label>
         	 <select class="form-control" id="autor'.$indice.'">';
    while($registro=mysqli_fetch_array($consulta)){
        echo'<option value="'.$registro['Id_autor'].'">'.utf8_encode($registro['Nombre']).'</option>';

    }
    echo "</select><br>";
     echo '
    	<label>Colaboraci&oacute;n Autor '.$indice.'</label>
    	<input class="form-control" type="text" id="coo'.$indice.'" >

    ';
?>