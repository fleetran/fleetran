<?php
class Ingreso{
	private $Id;
	private $Email;
	private $Empresa;
	private $Ip;
	private $Ciudad;
	private $Hora;
	private $Fecha;
	private $Estado;

	public function Ingreso($Id,$Empresa,$Email,$Ip,$Ciudad,$Hora,$Fecha,$Estado){
		$this->Id = $Id;
		$this->Email = $Email;
		$this->Empresa = $Empresa;
		$this->Ip = $Ip;
		$this->Ciudad = $Ciudad;
		$this->Hora = $Hora;						
		$this->Fecha = $Fecha;						
		$this->Estado = $Estado;						
	}
		
	public function getId(){
		return $this->Id;
	}
	public function getEmail(){
		return $this->Email;
	}
	public function getEmpresa(){
		return $this->Empresa;
	}
	public function getIp(){
		return $this->Ip;
	}
	public function getCiudad(){
		return $this->Ciudad;
	}
	public function getHora(){
		return $this->Hora;
	}
	public function getFecha(){
		return $this->Fecha;
	}
	public function getEstado(){
		return $this->Estado;
	}
	public function setId($Id){
		$this->Id = $Id;
	}
	public function setEmail($Email){
		$this->Email = $Email;
	}
	public function setEmpresa($Empresa){
		$this->Empresa = $Empresa;
	}
	public function setIp($Ip){
		$this->Ip = $Ip;
	}
	public function setCiudad($Ciudad){
		$this->Ciudad = $Ciudad;
	}
	public function setHora($Hora){
		$this->Hora = $Hora;
	}
	public function setFecha($Fecha){
		$this->Fecha = $Fecha;
	}
	public function setEstado($Estado){
		$this->Estado = $Estado;
	}
}
?>








