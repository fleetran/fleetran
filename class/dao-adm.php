<?php
	require('Ingreso.php');	
	require('Region.php');	
	require('Comuna.php');	
	
class DAO2{
	private $mi;

	
	private function conexion(){
		$this->mi = new MySQLi('localhost','root','','fleet_adm');	
		if($this->mi->connect_errno){
			die('Problema de conexion' . $this->mi->connect_error);
		}
	}
	private function desconexion(){
		$this->mi->close();
	}
			
	public function navBar(){
		$this->conexion();
		$sql = "select * from nav_bar;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0];
			$nom = $rs[1];
			$ico = $rs[2];
			$url = $rs[3];
    		$nav = new navBar($id,$nom,$ico,$url);				
			$lista[] = $nav;					
		}
			$this->desconexion();
			return $lista;
	
	}
	
	public function comprobarUsuarioAdm($user,$pass){
		$this->conexion();
		$sql = "select * from admin where Usuario='$user' and Password='$pass';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$nombre = $rs[1];
			return $nombre;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	public function logIngreso($email,$emp,$ip,$ciu,$hora,$fecha,$estado){
			$this->conexion();
			$sql = "insert into ingreso values (null,'$email','$emp','$ip','$ciu','$hora','$fecha','$estado');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function salidaLog($email,$ip,$hora,$fecha){
			$this->conexion();
			$sql = "insert into salidas values (null,'$email','$ip','$hora','$fecha');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function listarIngresos(){
		$this->conexion();
		$sql = "select id,email,empresa,ip,ciudad,hora,fecha,estados.detalle_estado from ingreso,estados where estado=estados.id_estado order by id desc limit 5;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$ema = $rs[1]; 
			$emp = $rs[2];
			$ip = $rs[3];
			$ciu = $rs[4];			
			$hor = $rs[5];
			$fech = $rs[6]; 
			$est = $rs[7]; 
			$ingreso = new Ingreso($id,$ema,$emp,$ip,$ciu,$hor,$fech,$est);
			$lista[] = $ingreso;					
			}	
		$this->desconexion();
		return $lista;
	}
	
	public function listarRegiones(){
		$this->conexion();
		$sql = "select * from regions;";
		$lista = array();
		mysqli_query($this->mi,"SET NAMES 'utf8'");
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$nom = $rs[1]; 
			$orden = $rs[3];
			$Region = new Region($id,$nom,$orden);
			$lista[] = $Region;					
			}	
		$this->desconexion();
		return $lista;
	}
	public function listarComunas(){
		$this->conexion();
		$sql = "select * from communes;";
		$lista = array();
		mysqli_query($this->mi,"SET NAMES 'utf8'");
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$nom = $rs[1]; 
			$orden = $rs[2];
			$Comuna = new Comuna($id,$nom,$orden);
			$lista[] = $Comuna;					
			}	
		$this->desconexion();
		return $lista;
	}
	
	
}
?>














