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


session_start();

if(!isset($_SESSION["username"])){
  header("Location: /Landing-Page-Template-Bootstrap/login.php");
}

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM `nomina`";
$nomina = $conn->query($sql);
//*/

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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
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
                    <div class="row">
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
    

  </footer>
</body>

</html>