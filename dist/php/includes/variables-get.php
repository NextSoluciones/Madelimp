<?php
$com=$_GET["comando"];
$act=$_GET["act"];
$pga=$_GET["pga"];
$tot=$_GET["tot"];
$data=$_GET["data"];
$producto=$_GET["producto"];
require_once 'php/lib/funciones.php';
$boolCategoria=comprobarCategoria($com);
$pag=pagina($pga,$act,$tot);
?>
