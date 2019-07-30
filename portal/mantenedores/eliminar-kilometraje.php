<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fleetran</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
<?php 
require('../../class/DAO.php');
session_start();
$d = new DAO();
if(!isset($_SESSION['LICENCIA'])){
	header("location:class/procesar.php");	
}
if(isset($_SESSION['USUARIO'])){
	$p = $_SESSION["planusuario"];
	$u = $_SESSION['USUARIO'];
	$nombre = $u->getNombre();
	$actividad = $p->getActividad();
	$flota = $p->getFlota();
	$lista = $d->vehiculosnoAsignados($u->getRut());
	$lista2 = $d->conductornoAsignados($u->getRut());
}			

?>
    <a class="navbar-brand mr-1" href="../../portal2.php"><?php echo strtoupper($nombre);?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Mi cuenta</a>          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../../portal2.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Menu Principal</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Mantenedores</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Entregas</h6>
		  <a class="dropdown-item" href="registrar-entrega.php">Registrar entrega</a>
		  <a class="dropdown-item" href="modificar-entrega.php">Modificar entrega</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Gestión de vehículos</h6>
          <a class="dropdown-item" href="nuevo-vehiculo.php">Nuevo vehículo</a>
		  <a class="dropdown-item" href="eliminar-vehiculo.php">Eliminar vehículo</a>
          <a class="dropdown-item" href="registrar-mantencion.php">Registrar mantencion</a>
          <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Gestión de rendimiento</h6>
          <a class="dropdown-item" href="registrar-kilometraje.php">Registrar kilometraje</a>
		  <a class="dropdown-item" href="modificar-kilometraje.php">Modificar registro</a>
          <a class="dropdown-item" href="eliminar-kilometraje.php">Eliminar registro</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Gestión de conductores</h6>
          <a class="dropdown-item" href="registrar-conductor.php">Registrar conductor</a>
          <a class="dropdown-item" href="suspender-conductor.php">Suspender conductor</a>
		  <a class="dropdown-item" href="vinculacion-conductor.php">Vinculacion de conductor</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Notas</h6>
		  <a class="dropdown-item" href="acontecimiento.php">Registrar acontecimiento</a>
		  <a class="dropdown-item" href="mantenedores/fecha-importante.php">Registrar fecha importante</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../estadistica.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Estadísticas</span></a>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-file"></i>
          <span>Reportes</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Informes</h6>
		  <a class="dropdown-item" href="../informes/acontecimientos.php">Acontecimientos</a>
		  <a class="dropdown-item" href="../informes/conductores.php">Conductores</a>
		  <a class="dropdown-item" href="../informes/egresos.php">Egresos</a>
		  <a class="dropdown-item" href="../informes/fechas.php">Fechas importantes</a>
		  <a class="dropdown-item" href="../informes/ingresos.php">Ingresos</a>
		  <a class="dropdown-item" href="../informes/rendimiento.php">Rendimiento</a>
		  <a class="dropdown-item" href="../informes/vehiculos.php">Vehículos</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shield-alt"></i>
          <span>Seguridad</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Respaldos</h6>
		  <a class="dropdown-item" href="../seguridad/copy.php">Copia de seguridad</a>
		  <a class="dropdown-item" href="../seguridad/restore.php">Restaurar copia</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Restablecer</h6>
		  <a class="dropdown-item" href="../seguridad/reset.php">Restablecer información</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="card mb-3">
          <div class="card-header">
            <i></i>
            Vinculación de conductores</div>
			
          <div class="card-body" style="margin-left:20%;margin-right:20%;">
        
		<h6>Seleccion de vehículo</h6>
			  <form  method="post" action="../../class/procesar.php"><div class="form-group">
                <select class="form-control" name="patente">
						<option value="0" selected disabled>Seleccione:</option>
						<?php
							for($i=0; $i<count($lista); $i++){
								$v = $lista[$i];
								echo "<option value='".$v->getPatente()."'>" . $v->getPatente()." - ".$v->getMarca()." ".$v->getModelo()."</option>";
							}
							if(isset($_REQUEST['patente'])){
								echo "<option selected value='".$_REQUEST['patente']."'>" . $_REQUEST['patente']."</option>";								
							}
							
						?>		
				</select>
              </div><h6>Datos del conductor</h6>
			  <div class="form-group">
                <select class="form-control" name="conductor" >
						<option value="0" selected disabled>Seleccione:</option>
						<?php
							for($i=0; $i<count($lista2); $i++){
								$c = $lista2[$i];
								echo "<option value='".$c->getRut()."'>" . $c->getRut()."  -  ". $c->getNombre1()." ".$c->getNombre2()." ".$c->getApellido1()." ". $c->getApellido2()."</option>";
							}
							if(isset($_REQUEST['conductor'])){
								echo "<option selected value='".$_REQUEST['conductor']."'>" . $_REQUEST['conductor']."</option>";								
							}
						?>		
				</select>
              </div>
		<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
  Guardar
</button>
<!-- Confirm Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea guardar los cambios?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Si hace clic en confirmar, la información será almacenada en la base de datos
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="btn_vinculacion" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin confirm Modal -->
</form>
		
      </div>
        </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Fleetran <?php echo  date("Y");?></span>
          </div>
        </div>
      </footer>
    
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Está seguro que desea salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Salir" si estas seguro que quieres cerrar tu sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../../salir.php">Salir</a>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../../js/demo/datatables-demo.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../vendor/chart.js/Chart.min.js"></script>
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  
  <script src="../../js/demo/chart-area-demo.js"></script>

</body>
</html>