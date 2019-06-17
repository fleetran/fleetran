<?php
class Vehiculo{
	private $patente;
	private $tipo;
	private $marca;
	private $modelo;
	private $color;
	private $ano;
	private $vin;
	private $motor;
	

	public function Vehiculo($patente,$tipo,$marca,$modelo,$color,$ano,$vin,$motor){
		$this->patente = $patente;
		$this->tipo = $tipo;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->color = $color;						
		$this->ano = $ano;						
		$this->vin = $vin;						
		$this->motor = $motor;						
	}
		
	public function getPatente(){
		return $this->patente;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getMarca(){
		return $this->marca;
	}
	public function getModelo(){
		return $this->modelo;
	}
	public function getColor(){
		return $this->color;
	}
	public function getAno(){
		return $this->ano;
	}
	public function getVin(){
		return $this->vin;
	}
	public function getMotor(){
		return $this->motor;
	}
	public function setPatente($patente){
		$this->patente = $patente;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function setMarca($marca){
		$this->marca = $marca;
	}
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	public function setColor($color){
		$this->color = $color;
	}
	public function setAno($ano){
		$this->ano = $ano;
	}
	public function setVin($vin){
		$this->vin = $vin;
	}
	public function setMotor($motor){
		$this->motor = $motor;
	}
}
?>








