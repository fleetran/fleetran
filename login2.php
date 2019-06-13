<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <br><center><div class="TLOGO"><a href="index.php"><img src="img/logomin.png"></a></div></center>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="txt_email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required="required" autofocus="autofocus">
              <label for="inputEmail">Correo electrónico</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="txt_pass" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar contraseña
              </label>
            </div>
          </div>
		  <button class="btn btn-primary btn-block" name="btn_ing" formaction="class/procesar.php">Acceder</button>
           
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="registro.php">Registrar un nuevo usuario</a>
          <a class="d-block small" href="recuperar.php">¿Olvidaste tu contraseña?</a>
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
