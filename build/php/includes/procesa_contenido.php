<?php
	// echo ($p>0||$c>0)?(($p>0)?'Eligio la categoria '.$p:'Eligio la cabecera '.$c):'';
	// if ($p>0||$c>0}
	if ($comando=="inicio"||$comando=="contacto"||$comando=="empresa"){
		include 'php/includes/procesa_cabecera.php';
	}
	else if (strlen($comando)>0){
		include 'php/includes/procesa_categoria.php';		
	}
?>
