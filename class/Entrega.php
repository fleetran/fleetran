<?php
class Entrega{
	private $Id;
	private $Patente;
	private $Vehiculo;
	private $Rut;
	private $Nombre;
	private $Fecha;
	private $Monto;

	public function Entrega($Id,$Patente,$Vehiculo,$Rut,$Nombre,$Fecha,$Monto){
		$this->Id = $Id;
		$this->Patente = $Patente;
		$this->Vehiculo = $Vehiculo;
		$this->Rut = $Rut;
		$this->Nombre = $Nombre;						
		$this->Fecha = $Fecha;						
		$this->Monto = $Monto;						
	}
		
	public function getId(){
		return $this->Id;
	}
	public function getPatente(){
		return $this->Patente;
	}
	public function getVehiculo(){
		return $this->Vehiculo;
	}
	public function getRut(){
		return $this->Rut;
	}
	public function getNombre(){
		return $this->Nombre;
	}
	public function getFecha(){
		return $this->Fecha;
	}
	public function getMonto(){
		return $this->Monto;
	}
	public function setId($Id){
		$this->Id = $Id;
	}
	public function setPatente($Patente){
		$this->Patente = $Patente;
	}
	public function setVehiculo($Vehiculo){
		$this->Vehiculo = $Vehiculo;
	}
	public function setRut($Rut){
		$this->Rut = $Rut;
	}
	public function setNombre($Nombre){
		$this->Nombre = $Nombre;
	}
	public function setFecha($Fecha){
		$this->Fecha = $Fecha;
	}
	public function setMonto($Monto){
		$this->Monto = $Monto;
	}
}
?>








