<?php
class Usuario{
	private $rut;
	private $nombre;
	private $email;
	private $Plan;
	private $password;
	

	public function Usuario($rut,$nombre,$email,$Plan,$password){
		$this->rut = $rut;
		$this->nombre = $nombre;
		$this->email = $email;
		$this->Plan = $Plan;
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
	public function getPlan(){
		return $this->Plan;
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
	public function setEmail($email){
		$this->email = $email;
	}
	public function setPlan($Plan){
		$this->Plan = $Plan;
	}
	public function setPassword($password){
		$this->password = $password;
	}
}
?>








