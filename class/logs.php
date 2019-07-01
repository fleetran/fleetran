<?php
	
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
			
		
	
	public function ingresoLog($email,$ip,$hora,$fecha,$estado){
			$this->conexion();
			$sql = "insert into ingreso values (null,'$email','$ip','$hora','$fecha','$estado');";
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
	public function existeConductor($rut){
			$this->conexion();
		$sql = "select * from conductor where rut_conductor='$rut'";
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
			$nom1 = $c->getNombre1();
			$nom2 = $c->getNombre2();
			$ape1 = $c->getApellido1();
			$ape2 = $c->getApellido2();
			$dir = $c->getDireccion();
			$num = $c->getNumero();
			$user = $u->getRut();
			$sql = "insert into conductor values ('$rut','$nom1','$nom2','$ape1','$ape2','$dir','$num','Carnet1','Carnet2','Licencia1','Licencia2','0','$user');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function existeVehiculo($pat){
			$this->conexion();
		$sql = "select * from vehiculo where patente_vehiculo='$pat'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	
	public function registrarVehiculo($v,$u){
			$this->conexion();
			$pat = $v->getPatente();
			$tip = $v->getTipo();
			$mar = $v->getMarca();
			$mod = $v->getModelo();
			$col = $v->getColor();
			$ano = $v->getAno();
			$vin = $v->getVin();
			$mot = $v->getMotor();
			$user = $u->getRut();
			$sql = "insert into vehiculo values ('$pat','$tip','$mar','$mod','$col','$ano','$vin','$mot','','$user');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function obtenerConductor($pat,$user){
		$this->conexion();
		$sql = "select conductor.rut_conductor,conductor.nombre1_conductor,conductor.nombre2_conductor,conductor.apellido1_conductor,conductor.apellido2_conductor from conductor,vehiculo where vehiculo.rut_conductor=conductor.rut_conductor and vehiculo.rut_user='$user' and vehiculo.patente_vehiculo='$pat';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$rut = $rs[0]; 
			$nom1 = $rs[1];
			$nom2 = $rs[2];
			$ape1 = $rs[3];
			$ape2 = $rs[4];
			$c = new Conductor($rut,$nom1,$nom2,$ape1,$ape2,'','','');
		}	
		$this->desconexion();
		return $c;
	}	
	
	public function listarVehiculos($rut){
		$this->conexion();
		$sql = "select patente_vehiculo,tipo_vehiculo,marca_vehiculo,modelo_vehiculo,color_vehiculo,ano_vehiculo,vin_vehiculo,motor_vehiculo,vehiculo.rut_conductor,vehiculo.rut_user from vehiculo,conductor where vehiculo.rut_user='$rut' and vehiculo.rut_conductor=conductor.rut_conductor ;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$patente = $rs[0]; 
			$tipo = $rs[1];
			$marca = $rs[2];
			$modelo = $rs[3];			
			$color = $rs[4]; 
			$ano = $rs[5]; 
			$vin = $rs[6]; 
			$motor = $rs[7]; 
			$Vehiculo = new Vehiculo($patente,$tipo,$marca,$modelo,$color,$ano,$vin,$motor);
			$lista[] = $Vehiculo;					
			}	
		$this->desconexion();
		return $lista;
	}	

		public function registrarEntrega($pate,$cond,$fech,$mont,$user){
			$this->conexion();
			$sql = "insert into entrega values (null,'$pate','$cond',(STR_TO_DATE('$fech', '%d/%m/%Y')),'$mont','$user');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
		public function listarEntrega($rut){
		$this->conexion();
		$sql = "select id_entrega,entrega.patente_vehiculo,concat(vehiculo.marca_vehiculo,' ',modelo_vehiculo) as vehiculo,conductor.rut_conductor,concat(conductor.nombre1_conductor,' ',conductor.nombre2_conductor,' ',conductor.apellido1_conductor,' ',conductor.apellido2_conductor) as nombre,DATE_FORMAT(fecha_entrega, '%d-%m-%Y'),entrega.monto_entrega from entrega,conductor,vehiculo where entrega.rut_conductor=conductor.rut_conductor and entrega.rut_user='$rut' and entrega.patente_vehiculo=vehiculo.patente_vehiculo;";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$patente = $rs[1]; 
			$vehiculo = $rs[2];
			$rut = $rs[3];			
			$nombre = $rs[4];
			$fecha = $rs[5]; 
			$monto = $rs[6]; 
			$entrega = new Entrega($id,$patente,$vehiculo,$rut,$nombre,$fecha,$monto);
			$lista[] = $entrega;					
			}	
		$this->desconexion();
		return $lista;
	}	
	
	public function vehiculosnoAsignados($rut){
		$this->conexion();
		$sql = "select * from vehiculo where rut_user='$rut' and rut_conductor='';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$patente = $rs[0]; 
			$tipo = $rs[1];
			$marca = $rs[2];
			$modelo = $rs[3];			
			$color = $rs[4]; 
			$ano = $rs[5]; 
			$vin = $rs[6]; 
			$motor = $rs[7]; 
			$Vehiculo = new Vehiculo($patente,$tipo,$marca,$modelo,$color,$ano,$vin,$motor);
			$lista[] = $Vehiculo;					
			}	
		$this->desconexion();
		return $lista;
	}	
	
	public function conductornoAsignados($rut){
		$this->conexion();
		$sql = "select * from conductor where rut_user='$rut' and estado='0';";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$rut = $rs[0]; 
			$nom1 = $rs[1];
			$nom2 = $rs[2];
			$ape1 = $rs[3];
			$ape2 = $rs[4];
			$c = new Conductor($rut,$nom1,$nom2,$ape1,$ape2,'','','');
			$lista[] = $c;					
			}	
		$this->desconexion();
		return $lista;
	}	
	
	public function registrarVinculacion($pate,$cond,$user){
			$this->conexion();
			$sql = "update vehiculo set rut_conductor ='$cond' where rut_user='$user' and patente_vehiculo='$pate';";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	public function registrarVinculacion2($cond,$user){
			$this->conexion();
			$sql = "update conductor set estado = '1' where rut_user='$user' and rut_conductor='$cond';";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();
	}
	
	public function anoMin($user){
		$this->conexion();
		$sql = "select min(year(fecha_entrega)) from entrega where rut_user='$user';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$min = $rs[0]; 
		}	
		$this->desconexion();
		return $min;
	}	
	public function anoMax($user){
		$this->conexion();
		$sql = "select max(year(fecha_entrega)) from entrega where rut_user='$user';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$min = $rs[0]; 
		}	
		$this->desconexion();
		return $min;
	}	
}
?>














