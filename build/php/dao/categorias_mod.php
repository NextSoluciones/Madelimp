<?php
require_once "modelo.php";
class catModelo extends modelo
{
    public function __construct()
    {
        parent::__construct();
    }
     public function get_id($nom)
    {
        $params = array(':nom' => $nom);
        $result=$this->_db->prepare('
        SELECT id FROM categoria
        WHERE (nombre = :nom)
        order by id asc');
        $result -> execute($params);
        $resultado=$result -> fetchAll(PDO::FETCH_ASSOC);
        $result -> closeCursor();
        return $resultado;
    }
    public function get_productos($cat,$data)
    {
        if ($data==1) {
          $params = array(':cat' => $cat);
          $result=$this->_db->prepare('
          SELECT id,nombre,descripcion,img FROM producto
          WHERE (id_categoria = :cat)
          order by id asc');

        }
        else {
          $params = array(':data' => $data);
          $result=$this->_db->prepare('
          SELECT *, MATCH (nombre, descripcion) AGAINST (:data) AS puntuacion
FROM producto WHERE MATCH(nombre, descripcion) AGAINST (:data IN BOOLEAN MODE)
ORDER BY puntuacion DESC LIMIT 50');
        }
        $result -> execute($params);
        $resultado=$result -> fetchAll(PDO::FETCH_ASSOC);
        $result -> closeCursor();
        return $resultado;
    }
    public function get_categoria()
    {
        $result=$this->_db->prepare('
        SELECT id,nombre FROM categoria');
        $result -> execute();
        $resultado=$result -> fetchAll(PDO::FETCH_ASSOC);
        $result -> closeCursor();
        return $resultado;
    }
    public function get_instancia()
    {
        $result=$this->_db->prepare('
        SELECT valor FROM config where id=1');
        $result -> execute();
        $resultado=$result -> fetchAll(PDO::FETCH_ASSOC);
        $result -> closeCursor();
        return $resultado;
    }
    public function get_producto($id)
    {
      $params = array(':id' => $id);
      $result=$this->_db->prepare('
      SELECT nombre,descripcion,img,detalle FROM producto
      WHERE (id = :id)
      ');
      $result -> execute($params);
      $resultado=$result -> fetchAll(PDO::FETCH_ASSOC);
      $result -> closeCursor();
      return $resultado;
    }
}
  ?>
