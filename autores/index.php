<?php
	@ob_start();
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php
	header('Access-Control-Allow-Origin: *');
	?>
    <meta charset="utf-8">
    <meta name="theme-color" content="#F0F0E9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Autores | LiberLibera</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/home/liberlibera.jpg">
    <script type="text/javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
    </script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
        $("#texto_busqueda").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                var txt=$("#texto_busqueda").val();
                window.top.location='../busqueda/?q='+txt;
            }
        });
    		$("#buscar").on("click",function(event) {
    			var txt=$("#texto_busqueda").val();
    			window.top.location='../busqueda/?q='+txt;
    		});
    	});
    </script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> Clubliberlibera@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/people/Club-Liber-Libera-Cecyteq/100010390333615"  target="_blanck"><i class="fa fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../"><img src="../images/logocecyte.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo '<a href="../notificaciones/"><i class="fas fa-bell"></i></a>';
										}
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['active']))
											echo '<a href="#"><i class="fa fa-user"></i> Cuenta</a>';
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['active'])){
											echo'<a href="#" data-toggle="modal" data-target="#modalclosesesion"><i class="fa fa-lock"></i> Cerrar Sesi&oacuten</a>';
										}else{
											echo '<a href="../login"><i class="fa fa-lock"></i> Iniciar Sesi&oacuten</a>';
										}
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['type_user'])){
											if($_SESSION['type_user']=='1')
												echo'<a href="../panel"><i class="fa fa-lock"></i>Administrador</a>';
										}
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<!--modal cerrar sesion-->
		<div class="modal fade" id="modalclosesesion">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">¿Desea cerrar la sesi&oacuten?</h5>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">Ten en cuenta que se perder&aacuten todos los cambios que no hayas guardado.</div>
					<div class="modal-footer">
						<a href="../php/close_session.php"class="btn btn-success">confirmar</a>
						<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="../">Inicio</a></li>
								<li><a href="../libros/?index=1">Libros</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Buscar" id="texto_busqueda" onfocus="" />
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	<section id="advertisement">
		<div class="container">
			<img src="" alt="" />
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>G&eacute;neros</h2>
						<div class="panel-group category-products" id="accordian"><!--categoria-->
							<?php
                                include("../php/conexion.php");
                                $sql="SELECT * FROM genero ORDER BY Nombre ASC";
                                $consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
                                while($datos=mysqli_fetch_array($consulta)){
                                    echo'
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="../libros/?index=1&genero='.utf8_encode($datos["Id_genero"]).'">'.utf8_encode($datos["Nombre"]).'</a></h4>
                                        </div>
                                    </div>
                                    ';
                                }
                            ?>

						</div><!--/Geneross-->
						<div class="brands_products"><!--Autores-->

						</div><!--/Autores-->
						<div class="shipping text-center">
						</div>
					</div>
				</div>
				<div class="col-sm-9 padding-right" >
					<div class="features_items" id="contenedor" ><!--Lista de libros-->
						<h2 class="title text-center">Autores</h2>
						<?php
							$index=$_GET['index'];
							$sql="SELECT * FROM autor ORDER BY Nombre ASC  LIMIT ".$index.",12";
							$consulta=mysqli_query($conexion,$sql) or die ("consulta muerta").mysqli_error();
							$i=0;
                            while($registro=mysqli_fetch_array($consulta)){
                            	$i++;
                            	$img="";
                            	if($registro['Sexo'])
                            		$img="../images/hombre.png";
                            	else
                            		$img="../images/mujer.png";
                            	echo '
                            		<div class="col-sm-4" >
										<div class="product-image-wrapper">
											<div class="single-products" style="height:450px!important;">
												<div class="productinfo text-center" >
													<img src="'.$img.'" alt="">
													<h2>'.utf8_encode($registro['Nombre']).'</h2>
													<a href="../libros/?index=1&autor='.$registro["Id_autor"].'" class="btn btn-default add-to-cart"><i class="fas fa-user"></i>Ver libros del autor</a>

												</div>
											</div>
										</div>
									</div>
                            	';
                            }
						?>
						<!--libros 12 item-->
						<!-- Libros-->
						<!--Paginador--->

						<!--/Paginador--->
					</div><!--Lista de libros-->
					<ul class="pagination">
							<?php
                                include('../php/conexion.php');
								$index=$_GET['index'];
								$autor="";
								$result=mysqli_query($conexion,"SELECT count(*) as Id_autor from autor");
							    $data=mysqli_fetch_assoc($result);
							    $r=ceil($data['Id_autor']/12);
							    $r2=$data['Id_autor'];
							    echo'<li><a href="books.php?index=12">&raquo;</a></li>';
							    if($index>12){
							    	if(ceil((($index-12)/12))<$r+1)echo "<li><a href='../autores/?index=".(12*(($index-12)/12))."".$autor."'>".ceil((($index-12)/12))."</a></li>";
							    	if(ceil(($index/12))<$r+1)echo'<li class="active"><a href="../autores/?index='.($index/12).''.$autor.'">'.ceil(($index/12)).'</a></li>';
							    	if(ceil((($index+12)/12))<$r+1)echo "<li><a href='../autores/?index=".(12*(($index+12)/12))."".$autor."'>".ceil((($index+12)/12))."</a></li>";
							    }else{
							    	if(ceil(($index/12))<$r2)echo'<li class="active"><a href="../autores/?index='.($index/12).''.$autor.'">'.ceil(($index/12)).'</a></li>';
							    	if(ceil((($index+12)/12))<$r+1)echo "<li><a href='../autores/?index=".(12*(($index+12)/12))."".$autor."'>".ceil((($index+12)/12))."</a></li>";
							    	if(ceil((($index+24)/12))<$r+1)echo "<li><a href='../autores/?index=".(12*(($index+24)/12))."".$autor."'>".ceil((($index+24)/12))."</a></li>";
							    }


							?>
							<li><a href="../libros/?index=1200">&raquo;</a></li>
						</ul>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer"><!--Footer-->

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>LiberLibera</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Ayuda en l&iacute;nea</a></li>
								<li><a href="#">Cont&aacute;ctanos</a></li>
								<li><a href="#">Solicitar un libro</a></li>
								<li><a href="#">Nuestra Ubicaci&oacute;n</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Acerca de liberlibera</h2>
							<form action="#" class="searchform">
								<input type="email" placeholder="Tu direcci&oacute;n de correo electr&oacute;nico" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Recibe notificaciones de libros <br /> y contenido nuevo a tu correo...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright &copy; 2018 LiberLibera. Todos los derechos reservados.</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
    <script src="../js/jquery.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
