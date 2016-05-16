<?php
$com=$_GET["comando"];
$act=$_GET["act"];
$pga=$_GET["pga"];
$tot=$_GET["tot"];
require_once 'php/lib/funciones.php';
$boolCategoria=comprobarCategoria($com);
$pag=pagina($pga,$act,$tot);
?>
