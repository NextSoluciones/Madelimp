<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<?php
			require_once "./php/includes/variables-get.php";
			require_once "./php/encabezados-seo/titulos-seo.php";
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="author" type="text/plain" href="humans.txt" />
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css"/>
	<!-- smoosh --><link rel="stylesheet" href="./css/main.css"/><!-- endsmoosh -->
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js></script>
	<!--[endif]-->
	<!--comentario tonto -->
	<?php require_once "./php/encabezados-seo/canonicalizacion.php"; ?>
</head>
<body>
	<header>
		<caja1>
			<div id="idimg">
				<img src="./img/logo.png" alt="logo de la empresa Madelimp" class='logo'>
			</div>
			<div id="textologo">
				Inversiones Madelimp SAC
			</div>
			<div id="botonmenu">
				<a href="#" id="btnMenu">
					<svg class="icon icon-menu"><use xlink:href="#icon-menu"></use>
				    <defs>
							<symbol id="icon-menu" viewBox="0 0 16 16">
							<title>menu</title>
							<path class="path1" d="M1 3h14v3h-14zM1 7h14v3h-14zM1 11h14v3h-14z"></path>
							</symbol>
				    </defs>
				  </svg>
				</a>
			</div>
		</caja1>
		<nav id="barraNav">
			<div><ul>
				<li><a id="btnMenui1" href="inicio">Inicio</a></li>
				<li><a id="btnMenui2" href="contacto">Contacto</a></li>
				<li><a id="btnMenui3" href="empresa">Empresa</a></li>
			</ul></div>
		</nav>
		<div id="separador"></div>
	</header>
	<section>
		<sidebar id="sideMenu">
			<a href="#" id="btnProductosMenu"><caja><div>Productos</div></caja><div id="flecha"></div></a>
			<ul id="categoriasSide">
				<?php include './php/includes/llenaCategoria.php'; ?>
			</ul>
		</sidebar>
		<article>
			<?php $comando = isset($_GET["comando"])?$_GET["comando"]:"inicio"; include './php/includes/procesa_contenido.php'; ?>
		</article>
	</section>
	<footer>
		<address>
				Sector 2 Mz. &quot;F&quot; Lte. 10 Grupo 20 - Villa El Salvador<br/>
				Telf.&#58; 287-5837 &#47; Cel.: 987949271 &#47; Next.&#58; 136&#42;0367<br/>
				e-mail&#58; julio.ventas&#64;madelimp.com
		</address>
	</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js"></script>
		<!-- smoosh --><script src="./js/bundle.js"></script><!-- endsmoosh -->
</body>
</html>
