<!DOCTYPE html>
<html lang="en">
<head>
<?php 
require ('class/Plan.php');
session_start();
if(isset($_SESSION['LICENCIA'])){
	header("location:portal2.php");	
}
if(!isset($_SESSION['USUARIO'])){
	header("location:login2.php");	
}
if(isset($_SESSION['USUARIO']) and isset($_SESSION['planusuario'])){
	$p = $_SESSION['planusuario'];
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  

</head>

<body class="bg-dark" >
<br><br><br>
  <center><div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i></i>
                <center><div class="TLOGO"><a href="index.php"><img src="img/logomin.png"></a></div></center></div>
              <div class="card-body">
                <h5>Plan <?php echo $p->getActividad();?></h5>
				<br>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Incluye:</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th><?php
					echo '$'.number_format($p->getMonto(), 0, '', '.'); ?></th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>- <?php echo $p->getFlota();?></td>
                  </tr>
                  <tr>
                    <td>- Gestión de conductores</td>
                  </tr>
                  <tr>
                    <td>- Gestión de tareas</td>
                  </tr>
				  <tr>
                    <td>- Estadísticas</td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div class="card-footer small text-muted">
			  <a mp-mode="dftl" href="https://www.mercadopago.com/mlc/checkout/pay?pref_id=127532225-6e047a77-b508-42a4-9c6a-8a3d76caff0f" name="MP-payButton" class='grey-tr-m-rn-clon'>Comprar</a><script type="text/javascript">(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})(); </script>
			  <br><br><h6><a href="salir.php">Cerrar sesión</a></h6>
			  
			  </div>
            </div>
          </div></center>
        </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
