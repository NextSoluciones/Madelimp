<?php
	require_once 'php/dao/categorias_mod.php';
  $catModel=new catModelo();
  $producto=$catModel->get_producto($data);

  /*array(1) { [0]=> array(4) {
  ["nombre"]=> string(5) "d1001"
  ["descripcion"]=> string(43) "dispensador papel toalla rollos center full"
  ["img"]=> string(47) "Dispensador-Papel-Toalla-Rollos-Center-Full.jpg"
  ["detalle"]=> string(20) "Detalle del producto" } }*/

//Solo en remoto

  $nombreUtf=$producto[0]["nombre"];
  $descripcionUtf=$producto[0]["descripcion"];
  $rutaUtf=$producto[0]["img"];
  $detalleUtf=$producto[0]["detalle"];

  $nombreUtf=utf8_encode($nombreUtf);
  $descripcionUtf=utf8_encode($descripcionUtf);
  $rutaUtf=utf8_encode($rutaUtf);
  $detalleUtf=utf8_encode($detalleUtf);//Solo en remoto

  ?>
  <div class="img-content-producto">
    <img src='assets/loading.gif' data-src='img/img-grande/<?=$rutaUtf ?>'
      alt='<?=$descripcionUtf ?>' title='<?=$descripcionUtf ?>' class='lazyload loading img-producto'></img>
  </div>
  <div class="contenedor-caption-producto">
    <div class="tabla-producto">
      <div class="nombre-producto">
        <h1><?=$nombreUtf ?></h1>
      </div>
      <div class="descripcion-producto">
        <h2><?=$descripcionUtf ?></h2>
      </div>
      <div class="detalle-producto">
        <p><?=$detalleUtf ?>
        </p>
				<a href="javascript:history.go(-1)" class="atras"><div class="triangulo triangulo-left"><div></div></div>
					<span class="spnAtras">Atrás</span></a>
      </div>
    </div>
  </div>
