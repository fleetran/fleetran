<?php

class Tipo{
	
	private $Id,$Nom;
	
	public function Tipo($Id,$Nom){
		$this->Id = $Id;
		$this->Nom = $Nom;
	}	
	
	public function getId(){
		return $this->Id;
	}	
	public function getNom(){
		return $this->Nom;
	}
	
	
}

?>