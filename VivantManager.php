<?php 
require_once("Database.php");

abstract class VivantManager 
{
  protected $_db;
	protected $_table;
	
	public function __construct()
	{
		$this->setDb(Database::getInstance());
	}
	
	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM '.$this->_table)->fetchColumn();
	}
	
	
	public function exists($info)
	{
		if (is_int($info))
		{
			return (bool)$this->_db->query('SELECT COUNT(*) FROM '.$this->_table.' WHERE id = '.$info)->fetchColumn();
		}
		
		$q = $this->_db->prepare('SELECT COUNT(*) FROM '.$this->_table.' WHERE nom = :nom');
		$q -> execute([':nom' => $info]);
		
		return (bool) $q->fetchColumn();
	}
	
	abstract public function get($info);
	
	abstract public function getList($nom);
	
	
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
	
}