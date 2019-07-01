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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
<?php 
require('../class/Usuario.php');
require('../class/Plan.php');
session_start();

if(!isset($_SESSION['LICENCIA'])){
	header("location:../class/procesar.php");	
}
if(isset($_SESSION['USUARIO'])){
	$p = $_SESSION["planusuario"];
	$u = $_SESSION['USUARIO'];
	$nombre = $u->getNombre();
	$actividad = $p->getActividad();
	$flota = $p->getFlota();
}			
?>
    <a class="navbar-brand mr-1" href="../portal"><?php echo strtoupper($nombre);?></a>

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
        <a class="nav-link" href="../portal2.php">
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
		  <a class="dropdown-item" href="mantenedores/registrar-entrega.php">Registrar entrega</a>
		  <a class="dropdown-item" href="mantenedores/modificar-entrega.php">Modificar entrega</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Gestión de vehículos</h6>
          <a class="dropdown-item" href="mantenedores/nuevo-vehiculo.php">Nuevo vehículo</a>
		  <a class="dropdown-item" href="mantenedores/eliminar-vehiculo.php">Eliminar vehículo</a>
          <a class="dropdown-item" href="mantenedores/registrar-mantencion.php">Registrar mantencion</a>
          <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Gestión de rendimiento</h6>
          <a class="dropdown-item" href="mantenedores/registrar-kilometraje.php">Registrar kilometraje</a>
		  <a class="dropdown-item" href="mantenedores/modificar-kilometraje.php">Modificar registro</a>
          <a class="dropdown-item" href="mantenedores/eliminar-kilometraje.php">Eliminar registro</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Gestión de conductores</h6>
          <a class="dropdown-item" href="mantenedores/registrar-conductor.php">Registrar conductor</a>
          <a class="dropdown-item" href="mantenedores/suspender-conductor.php">Suspender conductor</a>
		  <a class="dropdown-item" href="mantenedores/vinculacion-conductor.php">Vinculacion de conductor</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Notas</h6>
		  <a class="dropdown-item" href="mantenedores/acontecimiento.php">Registrar acontecimiento</a>
		  <a class="dropdown-item" href="mantenedores/fecha-importante.php">Registrar fecha importante</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="estadistica.php">
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
		  <a class="dropdown-item" href="informes/acontecimientos.php">Acontecimientos</a>
		  <a class="dropdown-item" href="informes/conductores.php">Conductores</a>
		  <a class="dropdown-item" href="informes/egresos.php">Egresos</a>
		  <a class="dropdown-item" href="informes/fechas.php">Fechas importantes</a>
		  <a class="dropdown-item" href="informes/ingresos.php">Ingresos</a>
		  <a class="dropdown-item" href="informes/rendimiento.php">Rendimiento</a>
		  <a class="dropdown-item" href="informes/vehiculos.php">Vehículos</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shield-alt"></i>
          <span>Seguridad</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Respaldos</h6>
		  <a class="dropdown-item" href="seguridad/copy.php">Copia de seguridad</a>
		  <a class="dropdown-item" href="seguridad/restore.php">Restaurar copia</a>
		  <div class="dropdown-divider"></div>
		  <h6 class="dropdown-header">Restablecer</h6>
		  <a class="dropdown-item" href="seguridad/reset.php">Restablecer información</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        

        <!-- Icon Cards-->
       
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">Conductores</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver Detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Entregas</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver Detales</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-car"></i>
                </div>
                <div class="mr-5">Vehículos</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver Detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                <div class="mr-5">Rendimiento</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver Detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Estadísticas</div>
          <div class="card-body">
	            <iframe src="index.php" frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;"></iframe>
				

          </div>
		  
          <div class="card-footer small text-muted">Actualizado hoy a las 13:30 horas</div>
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
    

    </div>
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
          <a class="btn btn-primary" href="../salir.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../js/demo/datatables-demo.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  
  <script src="../js/demo/chart-area-demo.js"></script>

</body>
</html>