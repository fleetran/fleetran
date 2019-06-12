<?php
class Usuario{
	private $email;
	private $nombre;
	private $apellido;
	private $rut;
	private $emresa;
	private $password;
	

	public function Usuario($email,$nombre,$apellido,$rut,$empresa,$password){
		$this->email = $email;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->rut = $rut;
		$this->empresa = $empresa;			
		$this->password = $password;						
	}
		
	public function getEmail(){
		return $this->email;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getRut(){
		return $this->rut;
	}
	public function getEmpresa(){
		return $this->empresa;
	}	
	public function getPassword(){
		return $this->password;
	}
	
	public function setEmail($ema){
		$this->email = $ema;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function setRut($rut){
		$this->rut = $rut;
	}
	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}
	public function setPassword($password){
		$this->password = $password;
	}
}
?>








