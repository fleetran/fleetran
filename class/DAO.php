<?php
	require ('Usuario.php');
	require ('Conductor.php');
	require ('Vehiculo.php');
	require ('Plan.php');
	require ('Entrega.php');
	require ('Licencia.php');	
class DAO{
	private $mi;

	
	private function conexion(){
		$this->mi = new MySQLi('localhost','root','','fleetran');	
		if($this->mi->connect_errno){
			die('Problema de conexion' . $this->mi->connect_error);
		}
	}
	private function desconexion(){
		$this->mi->close();
	}
			
	public function comprobarUsuario($email,$pass){
		$this->conexion();
		$sql = "select * from usuario where email_user='$email' and password_user='$pass';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$rut = $rs[0];
			$nombre = $rs[1];
			$email = $rs[2];
			$plan = $rs[3];
			$pass = $rs[4];	
    		$u = new Usuario($rut,$nombre,$email,$plan,$pass);				
			return $u;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	
	public function detallePlan($id){
		$this->conexion();
		$sql = "select * from plan where id_plan='$id';";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0];
			$actividad = $rs[1];
			$flota = $rs[2];
			$monto = $rs[3];
    		$p = new Plan($id,$actividad,$flota,$monto);				
			return $p;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	
	public function existeEmail($email){
		$this->conexion();
		$sql = "select * from usuario where email_user='$email'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	
	public function existeRut($rut){
		$this->conexion();
		$sql = "select * from usuario where rut_user='$rut'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
	}
	public function comprobarLicencia($rut){
		$this->conexion();
		$sql = "select * from licencias where rut_user='$rut'";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$this->desconexion();				
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
}

	public function listarTransacciones($rut){
		$this->conexion();
		$sql = "SELECT * from licencias WHERE rut_user='$rut'";
		$lista = array();
		$st = $this->mi->query($sql);
		while($rs = $st->fetch_array(MYSQLI_BOTH)){
			$id = $rs[0]; 
			$ema = $rs[1];
			$des = $rs[2];
			$fec = $rs[3];			
			$vig = $rs[4]; 
			$mont = $rs[5]; 
			$licencias = new Licencia($id,$ema,$des,$fec,$vig,$mont);
			$lista[] = $licencias;					
			}	

		$this->desconexion();
		return $lista;
	}	
	
	public function registrarUsuario(Usuario $u){
			$this->conexion();
			$rut = $u->getRut();
			$nom = $u->getNombre();
			$ema = $u->getEmail();
			$plan = $u->getPlan();
			$pas = $u->getPassword();
			$sql = "insert into usuario values ('$rut','$nom','$ema','$plan','$pas');";
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
			$sql = "insert into entrega values (null,'$pate','$cond','$fech','$mont','$user');";
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
		$sql = "select id_entrega,entrega.patente_vehiculo,concat(vehiculo.marca_vehiculo,' ',modelo_vehiculo) as vehiculo,conductor.rut_conductor,concat(conductor.nombre1_conductor,' ',conductor.nombre2_conductor,' ',conductor.apellido1_conductor,' ',conductor.apellido2_conductor) as nombre,fecha_entrega,entrega.monto_entrega from entrega,conductor,vehiculo where entrega.rut_conductor=conductor.rut_conductor and entrega.rut_user='$rut' and entrega.patente_vehiculo=vehiculo.patente_vehiculo;";
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
}
?>














