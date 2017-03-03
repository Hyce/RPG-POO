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
        $db = new PDO('mysql:host=localhost:8889;dbname=php_tp1','root','root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

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