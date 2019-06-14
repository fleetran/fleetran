<?php
class Usuario{
	private $rut;
	private $nombre;
	private $email;
	private $actividad;
	private $flota;
	private $password;
	

	public function Usuario($rut,$nombre,$email,$actividad,$flota,$password){
		$this->rut = $rut;
		$this->nombre = $nombre;
		$this->email = $email;
		$this->actividad = $actividad;
		$this->flota = $flota;			
		$this->password = $password;						
	}
		
	public function getRut(){
		return $this->rut;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getActividad(){
		return $this->actividad;
	}
	public function getFlota(){
		return $this->flota;
	}	
	public function getPassword(){
		return $this->password;
	}
	public function setRut($rut){
		$this->rut = $rut;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setEmail($ema){
		$this->email = $ema;
	}
	public function setActividad($actividad){
		$this->actividad = $actividad;
	}
	public function setflota($flota){
		$this->flota = $flota;
	}
	public function setPassword($password){
		$this->password = $password;
	}
}
?>








