<?php
include("../../../php/conexion.php");
$id=$_POST['id'];
$sql="SELECT * FROM autor WHERE Id_autor='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
$datos=mysqli_fetch_array($consulta);
echo'
    <div class="form-group">
        <label>Id_autor</label>
        <input type="text" class="form-control" value="'.$datos['Id_autor'].'" id="id_autor">
        <label>Nombre</label>
        <input type="text" class="form-control" value="'.utf8_encode($datos['Nombre']).'" id="nombre">
        <label>Nacionalidad</label>
        <input type="text" class="form-control" value="'.utf8_encode($datos['Nacionalidad']).'" id="nacionalidad">
        <label>Nacimiento</label>
        <input type="date" class="form-control" value="'.$datos['Nacimiento'].'" id="nacimiento">
        <label>Muerte</label>
        <input type="date" class="form-control" value="'.$datos['Muerte'].'" id="muerte">
        <label>Sexo</label>
        <select class="form-control"  id="sexo">
   
';
if($datos['Sexo']==1)echo "<option value='1' selected>Hombre</option><option value='0'>Mujer</option>";
else echo "<option value='1' >Hombre</option><option selected value='0'>Mujer</option>";
echo ' </select></div>';
?>