<?php
class listaEmpresa{
	private $empresa;
	private $nombre;
	private $logo;
	private $descr;
	private $f_reg;
	private $f_ven;
	private $estado;
	

	public function listaEmpresa($empresa,$nombre,$logo,$descr,$f_reg,$f_ven,$estado){
		$this->empresa = $empresa;
		$this->nombre = $nombre;
		$this->logo = $logo;
		$this->descr = $descr;
		$this->f_reg = $f_reg;						
		$this->f_ven = $f_ven;						
		$this->estado = $estado;						
	}
		
	public function getEmpresa(){
		return $this->empresa;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getLogo(){
		return $this->logo;
	}
	public function getDescr(){
		return $this->descr;
	}
	public function getf_reg(){
		return $this->f_reg;
	}
	public function getf_ven(){
		return $this->f_ven;
	}
	public function getestado(){
		return $this->estado;
	}
	public function setEmpresa($Empresa){
		$this->Empresa = $Empresa;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setLogo($Logo){
		$this->Logo = $Logo;
	}
	public function setDescr($Descr){
		$this->Descr = $Descr;
	}
	public function setf_reg($f_reg){
		$this->f_reg = $f_reg;
	}
	public function setf_ven($f_ven){
		$this->f_ven = $f_ven;
	}
	public function setEstado($Estado){
		$this->Estado = $Estado;
	}
}
?>








