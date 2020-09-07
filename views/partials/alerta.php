<?php
session_start();
if(isset($_SESSION['Logged'])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <title>Proyecto</title>
  </head>
  <body>
  <?php
    $mensaje = htmlentities($_GET['msj']);
    $carpeta = htmlentities($_GET['c']);
    $pagina = htmlentities($_GET['p']);
    $tipo = htmlentities($_GET['t']);

    switch ($carpeta) {
      case 'us':
        $folder = '../../views/';
        break;
      case 'pe':
        $folder = '../';
        break;
      case 'home':
        $folder = '../';
        break;
      case 'cli':
        $folder = '../';
        break;
      case 'ficha':
        $folder = '../';
        break;
      case 'salir':
        $folder = '../../';
        break;
    }

    switch ($pagina) {
      case 'in':
        $direccion = 'insertUser.php';
        break;
      case 'insertFicha':
        $direccion = 'insertFicha.php';
        break;
      case 'insertReport':
        $direccion = 'insertReport.php';
        break;
      case 'viewUsers':
        $direccion = 'viewUsers.php';
        break;
      case 'viewFichas':
        $direccion = 'viewFichas.php';
        break;
      case 'viewReports':
        $direccion = 'viewReports.php';
        break;
      case 'home':
        $direccion = 'home.php';
        break;
      case 'salir':
        $direccion = 'index.php';
        break;
      case 'ficha':
        $direccion = 'ficha.php';
        break;
      case 'pe':
        $direccion = 'profile.php';
        break;

    }

    $dir = $folder.$direccion;

    switch ($tipo) {
      case 'error':
        $titulo = "Oppss..";
        break;
      case 'success':
        $titulo = "Buen trabajo!";
          break;

    }


  ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>

    <script type="text/javascript">
    swal({
      title: '<?php echo $titulo ?>',
      text: '<?php echo $mensaje ?>',
      type: '<?php echo $tipo ?>',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
      }).then((result) => {
      if (result.value) {
        location.href='<?php echo $dir ?>';
      }
      })

      $(document).click(function(){
        location.href='<?php echo $dir ?>';
      });

      $(document).keyup(function(e){
        if(e.which == 27){
          location.href='<?php echo $dir ?>';
        }
      });
    </script>


  </body>
  </html>
  <?php 
}
else{
  header('location:../index.php');
}
?>
