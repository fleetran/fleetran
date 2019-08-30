<?php
class Conductor{
	private $rut;
	private $Nombre;
	private $Apellido;
	private $Fec_nac;
	private $Region;
	private $Comuna;
	private $Direccion;
	private $Carnet;
	private $Licencia;
	private $Fecha_reg;
	
	public function Conductor($rut,$Nombre,$Apellido,$Fec_nac,$Region,$Comuna,$Direccion,$Carnet,$Licencia,$Fecha_reg){
		$this->rut = $rut;
		$this->Nombre = $Nombre;
		$this->Apellido = $Apellido;
		$this->Fec_nac = $Fec_nac;
		$this->Region = $Region;						
		$this->Comuna = $Comuna;	
		$this->Direccion = $Direccion;			
		$this->Carnet = $Carnet;			
		$this->Licencia = $Licencia;			
		$this->Fecha_reg = $Fecha_reg;			
	}
		
	public function getRut(){
		return $this->rut;
	}
	public function getNombre(){
		return $this->Nombre;
	}
	public function getApellido(){
		return $this->Apellido;
	}
	public function getFec_nac(){
		return $this->Fec_nac;
	}
	public function getRegion(){
		return $this->Region;
	}
	public function getComuna(){
		return $this->Comuna;
	}
	public function getDireccion(){
		return $this->Direccion;
	}
	public function getCarnet(){
		return $this->Carnet;
	}
	public function getLicencia(){
		return $this->Licencia;
	}
	public function getFecha_reg(){
		return $this->Fecha_reg;
	}
	public function setRut($rut){
		$this->rut = $rut;
	}
	public function setNombre($Nombre){
		$this->Nombre = $Nombre;
	}
	public function setApellido($Apellido){
		$this->Apellido = $Apellido;
	}
	public function setFec_nac($Fec_nac){
		$this->Fec_nac = $Fec_nac;
	}
	public function setRegion($Region){
		$this->Region = $Region;
	}
	public function setComuna($Comuna){
		$this->Comuna = $Comuna;
	}
	public function setFecha_reg($Fecha_reg){
		$this->Fecha_reg = $Fecha_reg;
	}
}
?>








