<?php
class Licencia{
	private $id;
	private $email;
	private $descripcion;
	private $fecha;
	private $vigencia;
	private $monto;
	

	public function Licencia($id,$email,$descripcion,$fecha,$vigencia,$monto){
		$this->id = $id;
		$this->email = $email;
		$this->descripcion = $descripcion;
		$this->fecha = $fecha;
		$this->vigencia = $vigencia;			
		$this->monto = $monto;						
	}
		
	public function getId(){
		return $this->id;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function getfecha(){
		return $this->fecha;
	}
	public function getvigencia(){
		return $this->vigencia;
	}	
	public function getmonto(){
		return $this->monto;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setEmail($ema){
		$this->email = $ema;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
	public function setfecha($fecha){
		$this->fecha = $fecha;
	}
	public function setvigencia($vigencia){
		$this->vigencia = $vigencia;
	}
	public function setmonto($monto){
		$this->monto = $monto;
	}
}
?>