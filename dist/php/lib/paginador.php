<?php
class Paginador
{
    protected $_pagAct;
    protected $_totalPag;
    protected $_tablaDatos;
    protected $_elemXpag;
    public function __construct()
    {
    	$this->_pagAct=1;
      $this->_elemXpag=12;
    }
    public function procesarTabla($tabla, $act, $elemXpag)
    {
    	$this->_pagAct=$act;
    	$this->_tablaDatos=$tabla;
      $this->_elemXpag=$elemXpag;
    	$i=0;
    	$page=1;
    	foreach ($this->_tablaDatos as $row):
    		$i++;
    		if ($i%$this->_elemXpag==1){
    			$page=ceil($i/$this->_elemXpag);
    		}
    	endforeach;
    	$this->_totalPag = $page;
    }
    public function obtenerPagina($page)
    {
    	$i=0;
    	$tablaResultado=array();
    	foreach ($this->_tablaDatos as $row):
    		$i++;
    		if (ceil($i/$this->_elemXpag)==$page){
    			$tablaResultado[]=$row;
    		}
    	endforeach;
    	$this->_pagAct=$page;
    	return $tablaResultado;
    }
    public function obtenerPrimero()
    {
        $page=1;
        return $this->obtenerPagina($page);
    }
    public function obtenerUltimo()
    {
    	$page=$this->_totalPag;
    	return $this->obtenerPagina($page);
    }
    public function obtenerSiguente()
    {
    	if (!($this->_pagAct < $this->_totalPag)){
    		$page=$this->_totalPag;
            }
    	else{
    		$page=$this->_pagAct+1;
        }
    	return $this->obtenerPagina($page);
    }
    public function obtenerAnterior()
    {
    	if ($this->_pagAct==1){
    		$page=1;
        }
    	else{
    		$page=$this->_pagAct-1;
        }
    	return $this->obtenerPagina($page);
    }
    public function obtenerTotPag()
    {
    	return $this->_totalPag;
    }
    public function obtenerPagAct()
    {
    	return $this->_pagAct;
    }
}
?>
