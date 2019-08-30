<?php
class Vehiculo{
	private $patente;
	private $marca;
	private $Modelo;
	private $Color;
	private $Ano;
	private $Kms;
	private $Transmision;
	private $Combustible;
	private $Tipo;
	private $Conductor;
	private $Empresa;
	

	public function Vehiculo($patente,$marca,$Modelo,$Color,$Ano,$Kms,$Transmision,$Combustible,$Tipo,$Conductor,$Empresa){
		$this->patente = $patente;
		$this->marca = $marca;
		$this->Modelo = $Modelo;
		$this->Color = $Color;
		$this->Ano = $Ano;
		$this->Kms = $Kms;						
		$this->Transmision = $Transmision;						
		$this->Combustible = $Combustible;						
		$this->Tipo = $Tipo;						
		$this->Conductor = $Conductor;						
		$this->Empresa = $Empresa;						
	}
		
	public function getPatente(){
		return $this->patente;
	}
	public function getMarca(){
		return $this->marca;
	}
	public function getModelo(){
		return $this->Modelo;
	}
	public function getColor(){
		return $this->Color;
	}
	public function getAno(){
		return $this->Ano;
	}
	public function getKms(){
		return $this->Kms;
	}
	public function getTransmision(){
		return $this->Transmision;
	}
	public function getCombustible(){
		return $this->Combustible;
	}
	public function getTipo(){
		return $this->Tipo;
	}
	public function getConductor(){
		return $this->Conductor;
	}
	public function getEmpresa(){
		return $this->Empresa;
	}
	public function setPatente($patente){
		$this->patente = $patente;
	}
	public function setMarca($marca){
		$this->marca = $marca;
	}
	public function setModelo($Modelo){
		$this->Modelo = $Modelo;
	}
	public function setColor($Color){
		$this->Color = $Color;
	}
	public function setAno($Ano){
		$this->Ano = $Ano;
	}
	public function setKms($Kms){
		$this->Kms = $Kms;
	}
	public function setTransmision($Transmision){
		$this->Transmision = $Transmision;
	}
	public function setCombustible($Combustible){
		$this->Combustible = $Combustible;
	}
	public function setTipo($Tipo){
		$this->Tipo = $Tipo;
	}
	public function setConductor($Conductor){
		$this->Conductor = $Conductor;
	}
	public function setEmpresa($Empresa){
		$this->Empresa = $Empresa;
	}
}
?>








