<?php
	include_once('conexion.php');
	class Procesar extends Model{

		public function __construct(){ 
     	 	parent::__construct(); 
    	}

	    public function build_report($year){
	    	$total = array();
			//require('../class/DAO.php');
					//session_start();
					//$u = $_SESSION['USUARIO'];
					//$rut = $u->getRut();
					$rut = "19359735-1";
	    	for($i=0; $i<12; $i++){
	    		$month = $i+1;
	    		$sql = $this->db->query("SELECT SUM(monto_entrega) AS total FROM entrega WHERE MONTH(fecha_entrega) = $month AND rut_user='$rut' AND YEAR(fecha_entrega) = $year LIMIT 1 ");	
	    		$total[$i] = 0;
	    		foreach ($sql as $key){ $total[$i] = ($key['total'] == null)? 0 : $key['total']; }
	    	}			 
			return $total;
	    }

	}

	if($_POST['year']){
		$class = new Procesar;
		$run = $class->build_report($_POST['year']);
		exit(json_encode($run));
	}
?>