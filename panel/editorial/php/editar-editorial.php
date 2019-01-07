<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="SELECT * FROM editorial WHERE Id_editorial='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
$datos=mysqli_fetch_array($consulta);
echo"
    <div class='form-group'>
        <label>Nombre</label>
        <input type='text' class='form-control' value='".utf8_encode($datos['Nombre_editorial'])."'  id='nombre_editorial'>
    </div>
    ";
?>