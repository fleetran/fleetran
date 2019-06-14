<!DOCTYPE html>
<html lang="en">

<head>

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

<body class="bg-dark">

  <div <div class="form-row">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header" style="text-align:center;">
	  <center><div class="TLOGO"><a href="index.php"><img src="img/logomin.png"></a></div></center>
	  </div>
	  
      <div class="card-body">
        <form>
		<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="RUT del administrador o empresa" required="required" autofocus="autofocus" name="txt_rut">
                  <label for="lastName">RUT del administrador o empresa</label>
                </div>
              </div>
          <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" placeholder="Nombre de administrador o empresa" required="required" name="txt_nombre">
                  <label for="lastName">Nombre de administrador o empresa</label>
                </div>
              </div>
			  <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="txt_email" class="form-control" placeholder="Correo electrónico" required="required">
              <label for="inputEmail">Correo electrónico</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required">
                  <label for="inputPassword">Contraseña</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirme contraseña" required="required">
                  <label for="confirmPassword">Confirme contraseña</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="btn_reg2" formaction="class/procesar.php">Continuar</button>
        </form>
        <div class="text-center">
		  <a class="d-block small mt-3" href="login2.php">Iniciar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
