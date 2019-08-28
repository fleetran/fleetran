<?php

class Cuenta{

private $RUT,$EMAIL,$COLOR,$NOMBRE,$APELLIDO,$CARGO,$PERMISO,$ID_EMPRESA,$EMPRESA,$LOGO_EMPRESA,$FREG_EMPRESA,$FVEN_EMPRESA;

	public function Cuenta($RUT,$EMAIL,$COLOR,$NOMBRE,$APELLIDO,$CARGO,$PERMISO,$ID_EMPRESA,$EMPRESA,$LOGO_EMPRESA,$FREG_EMPRESA,$FVEN_EMPRESA){
		$this->RUT = $RUT;
		$this->EMAIL = $EMAIL;
		$this->COLOR = $COLOR;
		$this->NOMBRE = $NOMBRE;
		$this->APELLIDO = $APELLIDO;	
		$this->CARGO = $CARGO;						
		$this->PERMISO = $PERMISO;						
		$this->ID_EMPRESA = $ID_EMPRESA;						
		$this->EMPRESA = $EMPRESA;						
		$this->LOGO_EMPRESA = $LOGO_EMPRESA;						
		$this->FREG_EMPRESA = $FREG_EMPRESA;		
		$this->FVEN_EMPRESA = $FVEN_EMPRESA;						
													
	}
	
	public function getRut(){
		return $this->RUT;
	}
	public function getEma(){
		return $this->EMAIL;
	}
	public function getCol(){
		return $this->COLOR;
	}
	public function getNom(){
		return $this->NOMBRE;
	}
	public function getApe(){
		return $this->APELLIDO;
	}
	public function getCar(){
		return $this->CARGO;
	}
	public function getPer(){
		return $this->PERMISO;
	}
	public function getID_emp(){
		return $this->ID_EMPRESA;
	}
	public function getEmp(){
		return $this->EMPRESA;
	}
	public function getLogo(){
		return $this->LOGO_EMPRESA;
	}
	public function getFreg(){
		return $this->FREG_EMPRESA;
	}
	public function getFven(){
		return $this->FVEN_EMPRESA;
	}
	
	

}


?>