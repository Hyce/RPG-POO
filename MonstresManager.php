<?php
require_once("VivantManager.php");

class MonstresManager extends VivantManager
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_table = "ennemis";
	}
	
	public function add(Monstre $monster)
	{
		$q = $this->_db->prepare('INSERT INTO ennemis (nom) VALUES (:nom)');
		$q->bindValue(':nom', $monster->nom());
		$q->execute();
		
		$monster->hydrate([
			'id'=>$this->_db->lastInsertId(),
			'pv' => 0,
			'experience' => 0,
			'niveau' => 1,
			'nbCoups' => 0,]);
	}


	
	public function delete(Monstre $monster)
	{
		$this->_db->exec('DELETE FROM '.$this->_table.' WHERE id = '.$monster->id());
	}
	

	public function get($info)
	{
		if (is_int($info))
		{
			$q = $this->_db->query('SELECT id, nom, pv, experience, niveau  FROM hero WHERE id = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			
			return new Monstre($donnees);
		}
		
		$q = $this -> _db ->prepare('SELECT id, nom, pv, experience, niveau FROM hero WHERE nom = :nom');
		$q->execute([':nom' => $info]);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Monstre($donnees);
	}
	
	public function getList($nom)
	{
		$monsters = [];

		$q  =  $this->_db->prepare('SELECT id, nom, pv, experience, niveau FROM hero WHERE nom <> :nom ORDER BY nom');
		$q->execute([':nom'=>$nom]);

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$monsters[] = new Monstre($donnees);
		}
		return $monsters;
	}
	
	public function update(Monstre $monster)
	{
		$q  =  $this->_db->prepare('UPDATE hero SET pv = :pv, experience = :experience, niveau = :niveau WHERE id = :id');
		$q->bindValue(':pv',$monster->pv(), PDO::PARAM_INT);
		$q->bindValue(':experience',$monster->experience(), PDO::PARAM_INT);
		$q->bindValue(':niveau',$monster->niveau(), PDO::PARAM_INT);
	

		$q->bindValue(':id',$monster->id(), PDO::PARAM_INT);
		$q->execute();
	}
	
	
}