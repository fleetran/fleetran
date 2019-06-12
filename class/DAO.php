<?php
	require ('Usuario.php');
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
			$email = $rs[0];
			$nombre = $rs[1];
			$apellido = $rs[2];
			$rut = $rs[3];
			$empresa = $rs[4];
			$password = $rs[5];	
    		$u = new Usuario($email,$nombre,$apellido,$rut,$empresa,$password);				
			return $u;
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
public function comprobarLicencia($email){
		$this->conexion();
		$sql = "select * from licencias where email_user='$email' and diasrestantes_licencia>0";
		$st = $this->mi->query($sql);
		if($rs = $st->fetch_array(MYSQLI_BOTH)){
			$this->desconexion();				
			return 1;
		}else{
			$this->desconexion();
			return 0;
		}
}

	public function listarTransacciones($email){
		$this->conexion();
		$sql = "SELECT * from licencias WHERE email_user='$email'";
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
			$ema = $u->getEmail();
			$nom = $u->getNombre();
			$ape = $u->getApellido();
			$rut = $u->getRut();
			$emp = $u->getEmpresa();
			$pas = $u->getPassword();
			$sql = "insert into usuario values ('$ema','$nom','$ape','$rut','$emp','$pas');";
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














