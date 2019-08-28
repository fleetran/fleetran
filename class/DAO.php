<?php

require('Cuenta.php'); 
require('menu.php');
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
	
	
		

}}

?>