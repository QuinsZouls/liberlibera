<?php
include("../../../php/conexion.php");
require '../../../php/crypto.php';
$id=$_POST['id'];
$sql="SELECT * FROM empleado WHERE Numero_empleado='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
$datos=mysqli_fetch_array($consulta);
echo '
	<div class="form-group">
        <label>Alumno</label>
		<select class="form-control" id="alumno">
';
$sql="SELECT * FROM socios";
$consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
while($registro=mysqli_fetch_array($consulta)){
   if($registro['Id_socio']==$datos['Alumno']) 
    echo'<option value="'.$registro['Id_socio'].'" selected>'.decrypt($registro['Nombre_completo'],$key).'</option>';
   else 
    echo'<option value="'.$registro['Id_socio'].'" >'.decrypt($registro['Nombre_completo'],$key).'</option>';

}
echo '
        
';
echo '
		</select>
		<label>Cargo</label>
        <input type="text" class="form-control" id="cargo" value="'.utf8_encode($datos['Cargo']).'">
        <label>Turno</label>
        <input type="text" class="form-control" id="turno" value="'.utf8_encode($datos['Turno']).'">
        <label>Fecha de alta</label>
        <input type="date" class="form-control" id="fecha" value="'.utf8_encode($datos['Fecha_alta']).'">
        
    </div>
';
?>