<?php 
/*
  Usage : 
   $pdo = Database::getInstance();
  
*/
class Database
{
  static private $_instance = null; 
  
  public function __construct()
  {
    trigger_error("Not allowed to create a Database Object");
  }
  
  private static function getPDO()
  {
    $db = new PDO('mysql:host=localhost;dbname=php_tp1','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
  }

  static public function getInstance()
  {
    if(self::$_instance == null)
    {
      self::$_instance = self::getPDO();
    }
    return self::$_instance;
  }

}