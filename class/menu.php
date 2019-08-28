<?php

class Menu{
	
	private $nom,$url,$ico;
	
	public function Menu($nom,$url,$ico){
		$this->nom = $nom;
		$this->url = $url;
		$this->ico = $ico;
	}	
	
	public function getNom(){
		return $this->nom;
	}	
	public function getUrl(){
		return $this->url;
	}
	public function getIco(){
		return $this->ico;
	}		
	
}

?>