<?php
require __DIR__.'/bootstrap.php';
use Servicios\TokenServicio;
use Servicios\Container;
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recluta";
$invalid = false;
//*/

$invalid = false;
$message = false;

$container = new Container($configuration);
$tokenServicio = $container->getTokenServicio(); 
$nominaServicio = $container->getNominaServicio();
$autorizacionServicio = $container->getAutorizacionServicio(); 

session_start();
if( $token = isset($_SESSION["token"])?$_SESSION["token"]:false){
  if(!$autorizacionServicio->checkToken($token)){
    header("Location: login.php");
  }
}else{
  header("Location: login.php");
}


$nomina = $nominaServicio->fetchAllNomina();
/*
if(!isset($_SESSION["username"])){
  header("Location: /Landing-Page-Template-Bootstrap/login.php");
}

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM `nomina`";
$nomina = $conn->query($sql);
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if($nomina){
        $invalid=true;
        
        // file name for download
        $fileName = "NominaSindicato" . date('Ymd') . ".xls";
        
        // headers for download
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Content-Type: application/vnd.ms-excel");
        }

    }   
    
$conn = null;
//*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="assets/css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inscripcion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nomina.php">Nomina
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
  
  <main class="mt-5">
    <div class="container">
        
      <section class=" wow fadeIn" id="inscripcion">

        <!--Grid row-->
        <div class="row">
            <div class="col-md-12 text-center py-5">

            <div class="card">
              <div class="card-body">
                <?php
                    if($nomina){
                ?>
                    <h2>Nomina de inscritos:</h2>
                    <div class="row justify-content-md-center">
                    <form action="export.php" class="col-md-2" method="post" >
                        <button class="btn btn-info btn-block my-4" type="submit">Export</button>
                    </form>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Datos de contacto</th>
                        <th scope="col">Fecha de contratacion</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Sindicato</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                            foreach ($nomina as $persona) {
                        ?>
                        <tr>
                            <td><?php echo $persona['NOMBRE'].' '.$persona['APELLIDO']; ?></td>
                            <td><?php echo $persona['DATE_NAC']; ?></td>
                            <td><?php echo $persona['RUT'].'-'.$persona['DIG']; ?></td>
                            <td><?php echo $persona['COMUNA'].', '.$persona['CALLE_NUM']; ?></td>
                            <td><?php echo 'Correo: '.$persona['CORREO'].' Telefono: '.$persona['MOVIL']; ?></td>
                            <td><?php echo $persona['DATE_IN_EMP']; ?></td>
                            <td><?php echo $persona['SERVICIO']; ?></td>
                            <td><?php echo $persona['SINDICATO']; ?></td>
                            <td><?php echo $persona['DATE_REG']; ?></td>
                            <td><?php echo $persona['MONTO']; ?></td>
                        </tr>

                        <?php
                            }
                        }else{
                        
                        ?>
                        
                        <h1 class="p-5">
                                No Existe ninguna entrada en la base de datos.
                            
                        </h1>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table>
                    </div>               
            
                </div>
            </div>
        </div>
    </section>
    </div>
  </main>
  <!--Footer-->
  <footer class="page-footer text-center font-small py-3 wow fadeIn">


    
    <hr>
    <!--Copyright-->
    <div class="footer-copyright py-3">
      Desarrollado por: Arturo Perez
    </div>
    
    <hr>
    </div>
    <!--Grid column-->

    <div class="col-md-12 text-center">
        <h3 class="h3 mb-3 text-center">Material Design for Bootstrap</h3>
        <p>This template is created with Material Design for Bootstrap (
        <strong>MDB</strong> ) framework.</p>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>