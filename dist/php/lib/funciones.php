<?php
function utf8_encode_deep(&$input) {
    if (is_string($input)) {
        $input = utf8_encode($input);
    } else if (is_array($input)) {
        foreach ($input as &$value) {
            utf8_encode_deep($value);
        }

        unset($value);
    } else if (is_object($input)) {
        $vars = array_keys(get_object_vars($input));

        foreach ($vars as $var) {
            utf8_encode_deep($input->$var);
        }
    }
}


function comprobarCategoria($com){

    $esCategoria=false;

    require_once 'php/dao/categorias_mod.php';
    $catModel=new catModelo();
    $categorias=$catModel->get_categoria();

    foreach ($categorias as $row):
        $nombre=$row['nombre'];
        $nom=strtolower($nombre);
        $comando=strtolower($com);

        if ($nom==$comando){
            $esCategoria=true;
        }

    endforeach;

    return $esCategoria;
}

function pagina($pag_act,$accion,$tot) {
    $pagina=1;
    switch ($accion) {
            case 2:
                  if ($pag_act!=1)
                    $pagina=$pag_act-1;
                  else
                    $pagina=1;
                  break;
            case 3:
                  if ($pag_act!=$tot)
                    $pagina=$pag_act+1;
                  else
                    $pagina=$tot;
                  break;
            case 4:
                  $pagina=$tot;
                  break;
            default:
                  $pagina=1;
                  break;
      }
    return $pagina;
}
function urls_amigables($url) {
  // Tranformamos todo a minusculas
  $url = strtolower($url);
  //Rememplazamos caracteres especiales latinos
  $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
  $repl = array('a', 'e', 'i', 'o', 'u', 'n');
  $url = str_replace ($find, $repl, $url);
  // Añaadimos los guiones
  $find = array(' ', '&', '\r\n', '\n', '+');
  $url = str_replace ($find, '-', $url);
  // Eliminamos y Reemplazamos demás caracteres especiales
  $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
  $repl = array('', '-', '');
  $url = preg_replace ($find, $repl, $url);
  return $url;
}
?>
