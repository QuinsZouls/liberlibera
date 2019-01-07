<?php
	// Create connection
	require("funciones.php");
	require ("../../../asset/php/conn_blog.php");
    $sql = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		}


    //date page
    $titulo = utf8_decode($_POST['Titulo']);
    $imagen = $_POST['Url'];
    $referencias = utf8_decode($_POST['Referencias']);
    $contenido = utf8_decode($_POST['Contenido']);
    $etiqueta = $_POST['Etiqueta'];

		//search tiker
		$sql = "SELECT * FROM etiquetas WHERE Id_etiqueta='".$etiqueta."'";

		$result = $conn->query($sql) or die("Error sql: "). $conn->error;

		$tiker="";

		if ($result->num_rows > 0) {
				// output data of each row
				while($datos = $result->fetch_assoc()) {
					$tiker = normalizar_txt(utf8_encode($datos['Nombre']));
					$etiqueta = utf8_decode($datos['Nombre']);

				}
		} else {
				echo "0 results".$etiqueta;
		}


    //create file

    $url = "../../../../../blog/post/";

    //$tiker = normalizar_txt($etiqueta);

    $url.=$tiker."/";

    $nameFile = normalizar_txt(utf8_encode($titulo));

    //$nameFile.=".php";

    $url.=$nameFile;

    $userURL = "post/".$tiker."/".$nameFile."/";

    mkdir($url);

    $all = $url."/index.php";

    $handle = fopen($all, 'w') or die('Cannot open file:  '.$all);

		//insertar
		$sql = "INSERT INTO post(Autor,Imagen,Fecha,Titulo,Contenido,Etiqueta,Referencias,Dir,Url) VALUES('1','".($imagen)."','".date("d-m-y")."','".$titulo."','".$contenido."','".$_POST["Etiqueta"]."','".$referencias."','../../../../../blog/".$userURL."/','".$userURL."') ";
		$insert = $conn->query($sql) or die("error insert date: ").$conn->error;

		$conn->close();
    $data = '
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="theme-color" content="#FFF">
		<link rel="shortcut icon" href="../../../asset/icon/liberlibera-round.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<title>'.utf8_encode($titulo).'</title>
		<meta property="og:image" content="https://blog.liberlibera.tk/'.$imagen.'" >
		<meta property="og:title" content="'.utf8_encode($titulo).'" >
		<meta property="og:type" content="article">
		<meta property="og:url" content="blog.liberlibera.tk">
		<link rel="stylesheet" href="../../../asset/css/styles.css">
		<link rel="stylesheet" href="../../../asset/css/responsive.css">
		<link rel="stylesheet" href="../../../asset/css/animate.css">
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="top">
				<div class="logo animated">LiberLibera</div>
				<div class="menu-pc">
					<nav>
						<ul>
							<li><a href="../../../">Inicio</a></li>
							<li><a href="#">Categor&iacute;as</a></li>
							<li><a href="#">Sobre nosotros</a></li>
						</ul>
					</nav>
				</div>
				<div class="menu-movil">
					<a href="#" class="menu" id="mostrar_menu"><i class="fas fa-bars"></i></a>
				</div>
			</div>
		</header>
		<div class="modal-menu contraer ">
			<ul>
				<li><a href="../../../">Inicio</a></li>
				<li><a href="#">Categor&iacute;as</a></li>
				<li><a href="#">Sobre nosotros</a></li>
			</ul>
		</div>
		<main>
			<div class="contenedor">
				<h1>'.utf8_encode($titulo).'</h1>
				<img src="../../../'.$imagen.'" class="imagen-titular" alt="">
				<div class="contenido-post">
					'.utf8_encode($contenido).'
				</div>
				<div class="compartir ">
					<ul>
						<li><a href="https://www.facebook.com/sharer.php?u=https://blog.liberlibera.tk/'.$userURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://twitter.com/intent/tweet?url=https://blog.liberlibera.tk/'.$userURL.'" target="_blank"><i class="fab fa-twitter"></i></li>
						<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
					</ul>
				</div>
			</div>
		</main>
		<footer>
			<a href="#" id="subir" onclick="subir();"><i class="fas fa-arrow-up animated  "></i></a>
		</footer>
		<script type="text/javascript" src="../../../asset/js/Umbrella.js"></script>
		<script type="text/javascript" src="../../../asset/js/universal.js">
		</script>
	</body>
</html>
    ';


    fwrite($handle, $data);
    fclose($handle);

    echo $all;

?>
