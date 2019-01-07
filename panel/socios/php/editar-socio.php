<?php
include("../../../php/conexion.php");
require'../../../php/crypto.php';
$id=$_POST['id'];
$sql="SELECT * FROM socios WHERE Id_socio='".$id."'";
$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
$datos=mysqli_fetch_array($consulta);
echo'
    <div class="form-group">
        <label  style="display:none;">Id_socio</label>
        <input type="text" class="form-control" style="display:none;" value="'.utf8_encode($datos['Id_socio']).'" id="id_socio">
        <label>Nombre completo</label>
        <input type="text" class="form-control" value="'.decrypt(utf8_encode($datos['Nombre_completo']),$key).'" id="nombre">
        <label>Sexo</label>
        <select class="form-control" value="'.decrypt(utf8_encode($datos['Sexo']),$key).'" id="sexo">
            <option value="1">Masculino</option>
            <option value="0">Femenino</option>
        </select>
        <label>Alumno</label>
        <select class="form-control" value="'.utf8_encode($datos['Alumno']).'" id="alumno">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <label>Grado</label>
        <select class="form-control" value="'.decrypt(utf8_encode($datos['Grado']),$key).'" id="grado">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <label>Grupo</label>
        <select class="form-control" value="'.decrypt(utf8_encode($datos['Grupo']),$key).'" id="grupo">
            <option value="1">BM</option>
            <option value="2">AM</option>
            <option value="3">AM-BI</option>
            <option value="4">AV</option>
            <option value="5">BV</option>
        </select>
        <label>Especialidad</label>
        <select class="form-control"  value="'.decrypt(utf8_encode($datos['Especialidad']),$key).'" id="especialidad">
            <option value="1">Gesti&oacute;n administrativa.</option>
            <option value="2">Electr&oacute;nica</option>
            <option value="3">Mantenimiento</option>
            <option value="4">Mecatr&oacute;nica</option>
            <option value="5">Plasticos</option>
            <option value="6">Programaci&oacute;n</option>
        </select>
        <label>Turno</label>
        <select class="form-control" value="'.decrypt(utf8_encode($datos['Turno']),$key).'" id="turno">
            <option value="1">Matutino</option>
            <option value="2">Vespertino</option>
        </select>
        <label>N&uacute;mero de control</label>
        <input type="text" class="form-control" value="'.decrypt(utf8_encode($datos['No_control']),$key).'" id="no_control">
        <label>Fecha de nacimiento</label>
        <input type="date" class="form-control" value="'.$datos['Fecha_de_nacimiento'].'" id="nacimiento">
        <label>Email</label>
        <input type="email" class="form-control" value="'.decrypt(utf8_encode($datos['Email']),$key).'" id="email">
        <label>Facebook</label>
        <input type="text" class="form-control" value="'.decrypt(utf8_encode($datos['Facebook']),$key).'" id="facebook">
    </div>
    ';
?>
