<?php
	require_once 'php/dao/categorias_mod.php';
	$catModel=new catModelo();
    $categorias=$catModel->get_categoria();

    foreach ($categorias as $row):
    	$nombre=$row['nombre'];
    	$nom=strtolower($nombre);
    	echo "<li><a id='lisCat' href='".$nom."'>".$nombre."</a></li>";
    endforeach;
?>
