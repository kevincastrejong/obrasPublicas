<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Control de Obras</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="controllers/login/index.php" method="POST">
              <h1>Inicia Sesión</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Ingresar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Secretaria de Obras Publicas del Estado de Morelos</h1>
                  <p>©2019 Todos los derechos reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
