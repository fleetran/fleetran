<?php
	require ('Usuario.php');
	require ('Conductor.php');
	require ('Plan.php');
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
	
	public function registrarConductor($c){
			$this->conexion();
			$rut = $c->getRut();
			$nom1 = $c->getNombre1();
			$nom2 = $c->getNombre2();
			$ape1 = $c->getApellido1();
			$ape2 = $c->getApellido2();
			$dir = $c->getDireccion();
			$num = $c->getNumero();
			header('Location:../portal/prueba.php?rut='.$rut.'&nom1='.$nom1.'&nom2='.$nom2.'&ape1='.$ape1.'&ape2='.$ape2.'&dir='.$dir.'&num='.$num);					
			/*$sql = "insert into conductor values ('$rut','$nom1','$nom2','$ape1','$ape2','$dir','$num');";
			$st = $this->mi->query($sql);
			if($this->mi->affected_rows>0){
				return 1;
			}else{
				return 0;
			}
			$this->desconexion();*/
	}
	
}

?>














