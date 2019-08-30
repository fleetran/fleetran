<?php
class Vehiculo{
	private $patente;
	private $marca;
	private $Modelo;
	private $Tipo;
	private $Color;
	private $Kms;
	private $Ano;
	private $Region;
	private $Comuna;
	private $Transmision;
	private $Combustible;
	private $Fecha;
	private $Conductor;
	private $Empresa;
	
	public function Vehiculo($patente,$marca,$Modelo,$Tipo,$Color,$Kms,$Ano,$Region,$Comuna,$Transmision,$Combustible,$Fecha,$Conductor,$Empresa){
		$this->patente = $patente;
		$this->marca = $marca;
		$this->Modelo = $Modelo;
		$this->Tipo = $Tipo;						
		$this->Color = $Color;
		$this->Kms = $Kms;						
		$this->Ano = $Ano;
		$this->Region = $Region;
		$this->Comuna = $Comuna;
		$this->Transmision = $Transmision;						
		$this->Combustible = $Combustible;						
		$this->Fecha = $Fecha;						
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
	public function getTipo(){
		return $this->Tipo;
	}
	public function getColor(){
		return $this->Color;
	}
	public function getKms(){
		return $this->Kms;
	}
	public function getAno(){
		return $this->Ano;
	}
	public function getRegion(){
		return $this->Region;
	}
	public function getComuna(){
		return $this->Comuna;
	}
	public function getTransmision(){
		return $this->Transmision;
	}
	public function getCombustible(){
		return $this->Combustible;
	}
	public function getFecha(){
		return $this->Fecha;
	}
	public function getConductor(){
		return $this->Conductor;
	}
	public function getEmpresa(){
		return $this->Empresa;
	}
}
?>








