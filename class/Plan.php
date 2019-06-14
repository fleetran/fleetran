<?php
class Plan{
	private $Id;
	private $Actividad;
	private $Flota;
	private $Monto;
	

	public function Plan($Id,$Actividad,$Flota,$Monto){
		$this->Id = $Id;
		$this->Actividad = $Actividad;
		$this->Flota = $Flota;
		$this->Monto = $Monto;						
	}
		
	public function getId(){
		return $this->Id;
	}
	public function getActividad(){
		return $this->Actividad;
	}
	public function getFlota(){
		return $this->Flota;
	}	
	public function getMonto(){
		return $this->Monto;
	}
	public function setId($Id){
		$this->Id = $Id;
	}
	public function setActividad($Actividad){
		$this->Actividad = $Actividad;
	}
	public function setFlota($Flota){
		$this->Flota = $Flota;
	}
	public function setMonto($Monto){
		$this->Monto = $Monto;
	}
}
?>