<?php
require('Ingreso.php');	
class Logs{
	private $mi;

	
	private function conexion(){
		$this->mi = new MySQLi('localhost','root','','fleetran_log');	
		if($this->mi->connect_errno){
			die('Problema de conexion' . $this->mi->connect_error);
		}
	}
	private function desconexion(){
		$this->mi->close();
	}
			
		
	
	public function ingresoLog($email,$ip,$ciu,$hora,$fecha,$estado){
			$this->conexion();
			$sql = "insert into ingreso values (null,'$email','$ip','$ciu','$hora','$fecha','$estado');";
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
	
	public function nuevoConductorLog($rut,$ip,$hora,$fecha,$user){
			$this->conexion();
			$sql = "insert into nuevo_conductor values (null,'$rut','$ip','$hora','$fecha','$user');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	public function nuevoEntregaLog($rut,$patente,$ip,$hora,$fecha,$user){
			$this->conexion();
			$sql = "insert into nuevo_entrega values (null,'$rut','$patente','$ip','$hora','$fecha','$user');";
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
		$sql = "select id,email,ip,ciudad,hora,fecha,estados.detalle_estado from ingreso,estados where estado=estados.id_estado order by id desc limit 5;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$ema = $rs[1]; 
			$ip = $rs[2];
			$ciu = $rs[3];			
			$hor = $rs[4];
			$fech = $rs[5]; 
			$est = $rs[6]; 
			$ingreso = new Ingreso($id,$ema,$ip,$ciu,$hor,$fech,$est);
			$lista[] = $ingreso;					
			}	
		$this->desconexion();
		return $lista;
	}	
	
}
?>














