<?php
	require_once 'php/dao/categorias_mod.php';
	require_once 'php/lib/funciones.php';
			//cargamos la instancia para saber si estamos en local o remoto
			$instancia_t=$catModel->get_instancia();
			foreach ($instancia_t as $fila) {
						$valor=$fila['valor'];
						if (strlen($valor)>0)
						$instancia=$valor;
			}


      $pga=$_GET['pga'];
      $pagActual=($pga>0)?$pga:1;
      $a=$_GET['act'];
      $act=($a>0)?$a:1;

			//accion a ejecutar
			$catModel=new catModelo();
      $nom=$comando;
			if (!($nom=="busqueda")){
				$p_t=$catModel->get_id($nom);
	      foreach ($p_t as $fila) {
	            $id=$fila['id'];
	            if ($id>0)
	            $p=$id;
	      }
				$d=1;
			}else {
				$p=$nom;
				$d=$data;
			}

      /*echo "<script language='JavaScript'>
                alert('idCategoria: ".$p."');
                </script>";*/
      $productos=$catModel->get_productos($p,$d);
			//var_dump($productos);
      require_once 'php/lib/paginador.php';
      $paginaDatos=new Paginador();
      // if (empty($ancho))
      //       require_once "lib/js.php";
      $elemXpag=12;
      // if ($ancho<=640)
      //     $elemXpag=4;

      $paginaDatos->procesarTabla($productos,$pagActual,$elemXpag);
      $tablaPagina=array();
      switch ($act) {
            case 2:
                  $tablaPagina=$paginaDatos->obtenerAnterior();
                  break;
            case 3:
                  $tablaPagina=$paginaDatos->obtenerSiguente();
                  break;
            case 4:
                  $tablaPagina=$paginaDatos->obtenerUltimo();
                  break;
            default:
                  $tablaPagina=$paginaDatos->obtenerPrimero();
                  break;
      }
      $pagActual=$paginaDatos->obtenerPagAct();
      $totPag=$paginaDatos->obtenerTotPag();
	$cont=0;
      $elemXpag=12;
      $numeroFilas=2;
      $elemXfila=$elemXpag/$numeroFilas;
	// echo '<table><tr>';
      for ($i=0;$i<$elemXpag;$i++){
			$row=$tablaPagina[$i];
			$nombreUtf=$row['nombre'];
			$rutaUtf=$row['img'];
      if (($cont<$elemXpag)&&($row['id']>0)){
      $descripcionUtf=$row['descripcion'];
			$id_producto=$row['id'];
      if ($instancia=="remoto"){
      $nombreUtf=utf8_encode($nombreUtf);
      $descripcionUtf=utf8_encode($descripcionUtf);
			$rutaUtf=utf8_encode($rutaUtf);			
      }
			$urlamigable=urls_amigables($descripcionUtf);
      echo "<div class='celda'>
      <a href='producto-$id_producto"."_"."$urlamigable'><div class='img'>
					<picture>
						<source media='(min-width: 801px)' srcset='assets/loading.gif' data-srcset='img/img-web/".$rutaUtf."'>
						<source media='(min-width: 481px)' srcset='assets/loading.gif' data-srcset='img/img-retina/".$rutaUtf."'>
						<source media='(max-width: 480px)' srcset='assets/loading.gif' data-srcset='img/img-retina/".$rutaUtf." 2x'>
						<img src='assets/loading.gif' data-src='img/img-mobile/".$rutaUtf.
			      "' alt='".$descripcionUtf."' title='".$descripcionUtf."' class='lazyload loading'>
					</picture></div>
	      <div class='nom'>".$nombreUtf."</div>
	      <div class='desc'>".$descripcionUtf."</div></div></a>
	      ";
            }
      $cont++;
      }
?>
<!-- </tr></table> -->
<div id='desplazamiento'><div id="barrainferior">
      <a href=<?php echo "$pagActual-$comando-1-$totPag"; ?>>
            <span class="despP icon2 icon-previous2"></span></a>
      <a href=<?php echo "$pagActual-$comando-2-$totPag"; ?>>
            <span class="despA mega-octicon octicon-triangle-left"></span></a>
      <pag>Pagina <?php echo $pagActual." de ".$totPag ?></pag>
      <a href=<?php echo "$pagActual-$comando-3-$totPag"; ?>>
            <span class="despS mega-octicon octicon-triangle-right"></span></a>
      <a href=<?php echo "$pagActual-$comando-4-$totPag"; ?>>
            <span class="despU icon2 icon-next2"></span></a>
      <?php
      $pga="";
      $comando="";
      $act=""; ?>
</div></div>
