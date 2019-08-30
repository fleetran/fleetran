<?php

require('Cuenta.php'); 
require('menu.php');
require('Vehiculo.php');
require('Tipo.php');
require('Conductor.php');
require('listaEmpresa.php');

class DAO{

	private $mi;
	
	
	private function conexion(){
		$this->mi = new MySQLi('localhost','root','','fleet');	
		if($this->mi->connect_errno){
			die('ERROR EN LA CONEXION ' . $this->mi->connect_error);
		}
	}
	
	private function desconexion(){
		$this->mi->close();
	}	
	
	public function menu_dinamico(){
		$this->conexion();
		$sql = "select nombre,url,icono from menu_dinamico where TIPO='0';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nom = $rs[0];
			$url = $rs[1]; 
			$ico = $rs[2]; 
			$M = new Menu($nom,$url,$ico);
			$lista[] = $M;
		}
		$this->desconexion();
		return $lista;
	}
	
	public function menu_conductores(){
		$this->conexion();
		$sql = "select nombre,url,icono from menu_dinamico where TIPO='3';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nom = $rs[0];
			$url = $rs[1]; 
			$ico = $rs[2]; 
			$M = new Menu($nom,$url,$ico);
			$lista[] = $M;
		}
		$this->desconexion();
		return $lista;
	}
	public function menu_vehiculos(){
		$this->conexion();
		$sql = "select nombre,url,icono from menu_dinamico where TIPO='4';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nom = $rs[0];
			$url = $rs[1]; 
			$ico = $rs[2]; 
			$M = new Menu($nom,$url,$ico);
			$lista[] = $M;
		}
		$this->desconexion();
		return $lista;
	}

public function menu_getTitulo($url){
		$this->conexion();
		$sql = "select nombre,url,icono from menu_dinamico where Url='$url';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nom = $rs[0];
			$url = $rs[1]; 
			$ico = $rs[2]; 
			$M = new Menu($nom,$url,$ico);
			$lista[] = $M;
		}
		$this->desconexion();
		return $lista;
	}
	public function menu_dinamico_adm(){
		$this->conexion();
		
		$sql = "select nombre,url,icono from menu_dinamico where TIPO='1';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nom = $rs[0];
			$url = $rs[1]; 
			$ico = $rs[2]; 
			$M = new Menu($nom,$url,$ico);
			$lista[] = $M;
		}
		$this->desconexion();
		return $lista;
	}
	public function listarTipo(){
		$this->conexion();
		$sql = "select * from tipo;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0];
			$nom = $rs[1]; 
			$t = new Tipo($id,$nom);
			$lista[] = $t;
		}
		$this->desconexion();
		return $lista;
	}
	public function comprobarUsuario($EMAIL,$PWD){
		$this->conexion();
		$sql = "SELECT USUARIOS.RUT,USUARIOS.EMAIL,USUARIOS.COLOR,USUARIOS.NOMBRE,USUARIOS.APELLIDO,USUARIOS.CARGO,USUARIOS.PERMISO,EMPRESA.EMPRESA,EMPRESA.NOMBRE,EMPRESA.LOGO,EMPRESA.F_REG,EMPRESA.F_VEN FROM USUARIOS,EMPRESA WHERE USUARIOS.EMAIL='".$EMAIL."' AND USUARIOS.PWD='".$PWD."' AND USUARIOS.EMPRESA=EMPRESA.EMPRESA;";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$RUT = $rs[0];
			$EMAIL = $rs[1];
			$COLOR = $rs[2];
			$NOMBRE = $rs[3];
			$APELLIDO = $rs[4];	
			$CARGO = $rs[5];	
			$PERMISO = $rs[6];	
			$ID_EMPRESA = $rs[7];	
			$EMPRESA = $rs[8];	
			$LOGO_EMPRESA = $rs[9];	
			$FREG_EMPRESA = $rs[10];	
			$FVEN_EMPRESA = $rs[11];	
    		$U = new Cuenta($RUT,$EMAIL,$COLOR,$NOMBRE,$APELLIDO,$CARGO,$PERMISO,$ID_EMPRESA,$EMPRESA,$LOGO_EMPRESA,$FREG_EMPRESA,$FVEN_EMPRESA);				
			return $U;
		}else{
			$this->desconexion();
			return 0;
		}
	}
		
	
	public function comprobarLicencia($empresa){
		$this->conexion();
		$sql = "select empresa.nombre,plan.descr,empresa.f_ven from empresa, plan where empresa.plan=plan.plan and empresa.nombre='$empresa' and empresa.f_ven>curdate();";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$this->desconexion();				
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	public function listarEmpresas(){
		$this->conexion();
		$sql = "select empresa.empresa,empresa.nombre,empresa.logo,plan.descr,f_reg,empresa.f_ven,if(empresa.f_ven>curdate(),'Vigente','Caducada') as estado from empresa,plan where empresa.plan=plan.plan;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$empresa = $rs[0]; 
			$nombre = $rs[1]; 
			$logo = $rs[2];
			$descr = $rs[3];
			$f_reg = $rs[4];			
			$f_ven = $rs[5];
			$estado = $rs[6]; 
			$U = new listaEmpresa($empresa,$nombre,$logo,$descr,$f_reg,$f_ven,$estado);
			$lista[] = $U;					
			}	
		$this->desconexion();
		return $lista;
	}
	
	public function vehiculosnoAsignados($id){
		$this->conexion();
		$sql = "select patente,marca,modelo,color,ano,kms,transmision,combustible,tipo.des,rut_conductor,empresa from vehiculo, tipo where empresa='$id' and rut_conductor=0;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$patente = $rs[0]; 
			$marca = $rs[1];
			$modelo = $rs[2];			
			$color = $rs[3]; 
			$ano = $rs[4]; 
			$kms = $rs[5]; 
			$transmision = $rs[6]; 
			$combustible = $rs[7]; 
			$tipo = $rs[8]; 
			$cond = $rs[9]; 
			$empresa = $rs[10]; 
			$Vehiculo = new Vehiculo($patente,$marca,$modelo,$color,$ano,'','',$kms,$transmision,$combustible,$tipo,'',$cond,$empresa);
			$lista[] = $Vehiculo;					
			}	
		$this->desconexion();
		return $lista;
	}	
	public function existeConductor($rut){
			$this->conexion();
		$sql = "select * from conductor where rut='$rut'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	public function existeVehiculo($patente){
			$this->conexion();
		$sql = "select * from vehiculo where patente='$patente'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	public function registrarConductor($c,$u){
			$this->conexion();
			$rut = $c->getRut();
			$nom = $c->getNombre();
			$ape = $c->getApellido();
			$fec = $c->getFec_nac();
			$reg = $c->getRegion();
			$com = $c->getComuna();
			$dir = $c->getDireccion();
			$car = $c->getCarnet();
			$lic = $c->getLicencia();
			$fec_reg = $c->getFecha_reg();
			$sql = "insert into conductor values ('$rut','$nom','$ape','$fec','$reg','$com','$dir','$car','$lic','$fec_reg','1','$u');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function registrarVehiculo($v){
			$this->conexion();			
			$Patente = $v->getPatente();
			$Marca = $v->getMarca();
			$Modelo = $v->getModelo();
			$Color = $v->getColor();
			$Ano = $v->getAno();
			$Region = $v->getRegion();
			$Comuna = $v->getComuna();
			$Kms = $v->getKms();
			$Transmision = $v->getTransmision();
			$Combustible = $v->getCombustible();
			$Tipo = $v->getTipo();
			$Fecha = $v->getFecha();
			$empresa = $v->getEmpresa();
			$sql = "insert into vehiculo values ('$Patente','$Marca','$Modelo','$Color','$Ano','$Region','$Comuna','$Kms','$Transmision','$Combustible','$Tipo','$Fecha','0','$empresa');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function registrarVinculacion($pate,$cond,$user){
			$this->conexion();
			$sql = "update vehiculo set rut_conductor ='$cond' where empresa='$user' and patente='$pate';";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
}

?>