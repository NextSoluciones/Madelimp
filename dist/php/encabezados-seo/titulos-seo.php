<?php
	if (strlen($com)==0||$com="busqueda"){
		?>
<title>Art&iacute;culos de Limpieza</title>
<meta name="description" content="Productos de limpieza para el hogar, venta a distribuidores en Villa el Salvador - Lima - Peru. Somos Mayoristas" />
<META name="keywords" content="productos de limpieza, Inversiones, Madelimp, SAC, Articulos, Limpieza, Productos, Lima, Perú, hogar, empresa" />
<?php
	}

	if ($com=="inicio"){
		?>
<title>Art&iacute;culos de Limpieza - Inicio</title>
<meta name="description" content="Home - Inicio - Productos de limpieza para el hogar, venta a distribuidores en Villa el Salvador - Lima - Peru. Somos Mayoristas" />
<META name="keywords" content="productos de limpieza, Inversiones, Madelimp, SAC, Articulos, Limpieza, Productos, Lima, Perú, hogar, empresa" />
<?php
	}

	if ($com=="contacto"){
		?>
<title>Julio Acu&ntilde;a 987949271 Cont&aacute;ctenos</title>
<meta name="description"
content="Estamos ubicados en Villa el Salvador, contacte con Julio o Elizabeth para recibir una atencion personalizada" />
<META name="keywords" content="Inversiones, Madelimp, SAC, contacto, contáctenos, teléfono, celular, direccion, email, ventas" />
<?php
	}

	if ($com=="empresa"){
		?>
<title>Misi&oacute;n y visi&oacute;n de la empresa Madelimp SAC</title>
<meta name="description"
content="Somos distribuidores de productos de limpieza, brindamos los mejores precios. Estamos ubicados en Villa El Salvador-Lima Peru" />
<META name="keywords" content="Inversiones, Madelimp, SAC, distribuidores, clientes, visión, precio, comercial, mapa, ubicación" />
<?php
	}

	if ((strlen($com)>0)&&($boolCategoria||$act>0)) {
		?>
<title>Art&iacute;culos y productos de limpieza de la categor&iacute;a <?=$com?> P&aacute;gina
<?php
	if ($act>0){
		echo $pag." de ".$tot.".";
	}
	else{
		echo "Principal.";
	}
?>
</title>
<meta name="description"
content="Catalogo de los <?=$com?> que ofrecemos. <?php
	if ($act>0){
		echo "Pagina ".$pag." de ".$tot.".";
	}
	else{
		echo "Pagina Principal.";
	}
?>
" />
<META name="keywords" content="productos de limpieza, Inversiones, Madelimp, SAC, productos, <?=$com?> " />
<?php
	}

?>
