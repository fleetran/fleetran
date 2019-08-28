<?php

class Region{
	
	private $Id,$Nom,$Orden;
	
	public function Region($Id,$Nom,$Orden){
		$this->Id = $Id;
		$this->Nom = $Nom;
		$this->Orden = $Orden;
	}	
	
	public function getId(){
		return $this->Id;
	}	
	public function getNom(){
		return $this->Nom;
	}
	public function getOrden(){
		return $this->Orden;
	}		
	
}

?>