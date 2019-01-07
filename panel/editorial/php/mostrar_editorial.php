<?php
    include("../../../php/conexion.php");
    $sql="SELECT * FROM editorial";
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    while($registro=mysqli_fetch_array($consulta)){
        echo'
            <tr id="'.$registro['Id_editorial'].'">
            <td>'.utf8_encode($registro['Nombre_editorial']).'</td>
            <td><a href="#" data-toggle="modal" data-target="#editeditorial" id="editareditorial" data-id="'.$registro['Id_editorial'].'"><i class="fas fa-pencil-alt text-warning"></i></td>
            <td><a href="#" data-toggle="modal" data-target="#deleteeditorial" id="borrareditorial" data-id="'.$registro['Id_editorial'].'"><i class="fas fa-trash-alt text-danger"></i></a></td>
        </tr>';
    }
?>
