<?php

require_once("VivantManager.php");

class PersonnagesManager extends VivantManager
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_table = "hero";
	}

	public function add(Personnage $perso)
	{
		$q = $this->_db->prepare('INSERT INTO hero (nom) VALUES (:nom)');
		$q->bindValue(':nom', $perso->nom());
		$q->execute();
		
		$perso->hydrate([
			'id'=>$this->_db->lastInsertId(),
			'pv' => 0,
			'experience' => 0,
			'niveau' => 1,
			'nbCoups' => 0,]);
	}
	
	public function delete(Personnage $perso)
	{
		$this->_db->exec('DELETE FROM hero WHERE id = '.$perso->id());
	}
	

	public function get($info)
	{
		if (is_int($info))
		{
			$q = $this->_db->query('SELECT id, nom, pv, experience, niveau  FROM hero WHERE id = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			
			return new Personnage($donnees);
		}
		
		$q = $this -> _db ->prepare('SELECT id, nom, pv, experience, niveau FROM hero WHERE nom = :nom');
		$q->execute([':nom' => $info]);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Personnage($donnees);
	}
	
	public function getList($nom)
	{
		$persos = [];

		$q  =  $this->_db->prepare('SELECT id, nom, pv, experience, niveau FROM hero WHERE nom <> :nom ORDER BY nom');
		$q->execute([':nom'=>$nom]);

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}
		return $persos;
	}
	
	public function update(Personnage $perso)
	{
		$q  =  $this->_db->prepare('UPDATE hero SET pv = :pv, experience = :experience, niveau = :niveau WHERE id = :id');
		$q->bindValue(':pv',$perso->pv(), PDO::PARAM_INT);
		$q->bindValue(':experience',$perso->experience(), PDO::PARAM_INT);
		$q->bindValue(':niveau',$perso->niveau(), PDO::PARAM_INT);
	

		$q->bindValue(':id',$perso->id(), PDO::PARAM_INT);
		$q->execute();
	}
	
	
}