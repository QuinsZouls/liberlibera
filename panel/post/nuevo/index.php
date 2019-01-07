<?php
	@ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="theme-color" content="#ecf0f1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo Post</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Roboto" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet">
    <link href="../../css/responsive.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../asset/img/panel.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script type="text/javascript" src="js/main.js">

    </script>
	<script type="text/javascript" src="../../js/main.js"></script>
</head>
<body style="background-color: #ecf0f1!important;">
	<header class="nav-down">
        <div class="header-middle">
            <div class="logo">LIBERLIBERA</div>
            <div class="enlaces">
                <ul>
                    <li>
                        <a  id="user"><img src="../../../images/user.png" alt="" class="circulo avatar-usuario"></a>
                    </li>
                </ul>
                <div class="user-tool hide">
                    <ul>
                        <li><a href="../../"><i class="fas fa-arrow-left"></i> Volver</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#cerrar_session""><i class="fas fa-lock"></i> Cerrar sesi&oacute;n</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    
    <main>
        <h1 style="text-align: center;">Nuevo Post</h1>
    	<div class="modal fade" id="cerrar_session">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">¿Desea cerrar la sesi&oacute;n?</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        se perder&aacute;n los cambios que no hayas guardado
                    </div>
                    <div class="modal-footer">
                        <a href="../../../php/close_session.php" class="btn btn-success">confirmar</a>

                        <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="nuevo-post">
    		<label class="">T&iacute;tulo</label>
        	<input required type="text" id="titulo" class="form-control">
        	<br>
        	<form enctype="multipart/form-data" method="POST" id="subir" accept-charset="utf-8">
        		<label>Imagen de titulo</label>
        		<input required type="file" id="imagen" name="file" class="form-control">
                <input type="text"  placeholder="cargando imagen" id="imagen_url">
        		<br>
        		<button  type="submit" class="btn btn-primary"  >Subir foto</button><br>

        	</form>

        	<br>
        	<label>Contenido Principal</label>
        	<textarea id="contenido" required name="editordata"></textarea>
        	<br>
        	<label>Referencias</label>
        	<textarea id="referencias" class="form-control" required>

        	</textarea>
        	<br>
        	<label>Etiqueta</label>
        	<select id="etiqueta"  class="form-control">
        		<?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "blog";
                    $sql = "SELECT * FROM etiquetas";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
										$result = $conn->query($sql) or die("Error sql: "). $conn->error;

										if ($result->num_rows > 0) {
										    // output data of each row
										    while($datos = $result->fetch_assoc()) {
														echo "<option value='".$datos['Id_etiqueta']."'>".utf8_encode($datos['Nombre'])."</option>";
										    }
										} else {
										    echo "0 results";
										}
                    $conn->close();
                ?>
        	</select>
        	<br>
        	<a href="#"class="btn btn-primary" id="publicar" >Publicar</a>


        </div>


    </main>

</body>
</html>
