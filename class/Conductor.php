<?php
class Conductor{
	private $rut;
	private $nombre1;
	private $nombre2;
	private $apellido1;
	private $apellido2;
	private $direccion;
	private $numero;
	private $estado;
	
	public function Conductor($rut,$nombre1,$nombre2,$apellido1,$apellido2,$direccion,$numero,$estado){
		$this->rut = $rut;
		$this->nombre1 = $nombre1;
		$this->nombre2 = $nombre2;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->direccion = $direccion;
		$this->numero = $numero;						
		$this->estado = $estado;						
	}
		
	public function getRut(){
		return $this->rut;
	}
	public function getNombre1(){
		return $this->nombre1;
	}
	public function getNombre2(){
		return $this->nombre2;
	}
	public function getApellido1(){
		return $this->apellido1;
	}
	public function getApellido2(){
		return $this->apellido2;
	}
	public function getDireccion(){
		return $this->direccion;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setRut($rut){
		$this->rut = $rut;
	}
	public function setNombre1($nombre1){
		$this->nombre1 = $nombre1;
	}
	public function setNombre2($nombre2){
		$this->nombre2 = $nombre2;
	}
	public function setApellido1($apellido1){
		$this->apellido1 = $apellido1;
	}
	public function setApellido2($apellido2){
		$this->apellido2 = $apellido2;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}
}
?>








