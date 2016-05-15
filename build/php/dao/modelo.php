<?php
require_once "config.php";

class Modelo
{
    protected $_db;
    public function __construct()
    {
    	try{
    	$dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
    		echo "ERROR: " . $e->getMessage();
		}
    }
}
?>
