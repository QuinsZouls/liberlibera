<?php
    include("../../../php/conexion.php");
    $sql="SELECT * FROM genero";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'
            <tr id="'.$registro['Id_genero'].'">
            <td>'.utf8_encode($registro['Nombre']).'</td>
            <td><a href="#" data-toggle="modal" data-target="#editgenero" id="editargenero" data-id="'.$registro['Id_genero'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
            <td><a href="#" data-toggle="modal" data-target="#deletegenero" id="borrargenero" data-id="'.$registro['Id_genero'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
        </tr>';
    }
?>
