<?php
header("Content-Type: image/gif");
$id=$_GET['id'];
function foto($cod)
{
	require_once '../dao/categorias_mod.php';
	$catModel=new catModelo();
	$data=$catModel->get_foto($cod);
	$foto;
	foreach ($data as $row):
		$foto=$row['foto'];
	endforeach;
return $foto;
}
echo foto($id);
?>
