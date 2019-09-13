<?php
require __DIR__.'/bootstrap.php';
use Servicios\Container;
/*
$servername = "localhost";
$username = "id10335749_kbaseusr";
$password = "M@Ster123";
$dbname = "id10335749_recluta";
//*/
$invalid = false;
$message = false;
session_start();

$container = new Container($configuration);
$autorizacionServicio = $container->getAutorizacionServicio(); 
$comunaLoader = $container->getComunaLoader();
$nominaServicio = $container->getNominaServicio();
$sindicatoLoader = $container->getSindicatoLoader();

//echo $_SESSION["username"];
if( $token = isset($_SESSION["token"])?$_SESSION["token"]:false){
  if(!$autorizacionServicio->checkToken($token)){
    header("Location: login.php");
  }
}else{
  header("Location: login.php");
}

//*/
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recluta";
$message = false;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `TBL_COMUNAS` ORDER BY `TBL_COMUNAS`.`NOMBRE` ASC";
$result = $conn->query($sql);
//*/
        
$comunas = $comunaLoader->fetchAllComunas();
$sindicatos = $sindicatoLoader->fetchAllSindicatos();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    foreach($_POST as $key => $value){
        $$key = $value;
        
        if($value==""){
            $invalid=true;
        };
    }
    
    if(!$invalid){
      $message = $nominaServicio->insertNomina($nombre,$apellido,$rut,$dig,$nacdate,$callenum,$comuna,$servicio,$movil,$correo,$condate,$sindicato,$monto);
      /*
        $date = date("Y-m-d");
    
        $sql = "INSERT INTO NOMINA (NOMBRE, APELLIDO, RUT, DIG, DATE_NAC, CALLE_NUM, COMUNA, SERVICIO, MOVIL, CORREO, SINDICATO, DATE_REG, DATE_IN_EMP, MONTO)
        VALUES ('$nombre', '$apellido', '$rut', '$dig', '$nacdate', '$direccion', '$comuna', '$servicio', '$movil', '$correo', '$sindicato', '$date', '$condate','$monto')";

        if ($conn->query($sql) === TRUE) {
           $message = "success";
        } else {
           $message = "error";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //*/
    }
        
    
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed"; 
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
      }
    }
   
  }

//$conn->close(); 
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
          <!--/li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free tutorials</a>
          </li>
        </ul>

        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded"
              target="_blank">
              <i class="fab fa-github mr-2"></i>MDB GitHub
            </a>
          </li>
        </ul-->

      </div>

    </div>
  </nav>
  <!-- Navbar -->
  <div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">
    <?php
    
    if($message){
        if($message=='success'){
            echo '<div class="alert alert-success" role="alert">';
            echo 'inscripcion fue exitosa';
            echo '</div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Un error ocurrio al inscribirse';
            echo '</div>';
        }
        
    }      
        
    ?>
        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">SOLICITUD INCORPORACION</h1>

            <hr class="hr-light">

            <p>
              <strong>POR ESTE MEDIO TU PUEDES ELEVAR UNA SOLICITUD DE INSCRIPCIÓN A LOS SINDICATOS DE KONECTACHILE.</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>RECUERDA QUE TU DECIDES...</strong>
            </p>


          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                
                <h3 class="dark-grey-text text-center">
                    <strong>Inscribete</strong>
                </h3>
                    
                <p>
                    Inscripcion a un solo click, solo presiona el boton.
                </p>
                  <div class="text-center">
                    <a href="#inscripcion" class="btn btn-indigo">Inscribirse</a>
                  </div>

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

  <!--Main layout-->
  <main>
    <div class="container">
        
      <section class=" wow fadeIn" id="inscripcion">

        <!--Grid row-->
        <div class="row">
            <div class="col-md-12 text-center py-5">

            <div class="card">
              <div class="card-body">
                    <form action="index.php" method="post">
                    <h2>Ingrese todo sus datos:</h2>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 text-left">                    
                            <label for="form3">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                            <label for="form3">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required>
                            <label for="form2">Correo</label>
                            <input type="email"  name="correo" class="form-control" required>
                            <label for="form2">Celular</label>
                            <input type="tel"  name="movil" class="form-control" required>
                            <label>Numero de RUT </label>
                            <div class="form-row text-center">
                                <div class="col">
                                    <!-- First name -->
                                    <input type="number" name="rut" class="form-control" required>
                                </div>-
                                <div class="col">
                                    <!-- Last name -->
                                <input type="text" name="dig" class="form-control" style="width: 35px" maxlength="1" size="1" required>
                                </div>
                            </div>
                            <label for="fechanac">Fecha de nacimiento</label>
                            <input type="date" id="fechanac" name="nacdate" class="form-control" required>
                            
                        </div>
                        <div class="col-md-6 col-xs-12 text-left">  
                            <label>Comuna </label>
                            <select name="comuna" class="form-control" required>
                                <option value='' disabled selected>Selecciones una opcion</option>
                                <?php 
                                
                                foreach($comunas as $value){
                                    echo "<option value='".$value['NOMBRE']."'>".$value['NOMBRE']."</option>";
                                } //*/                                   
                                ?>
                            </select>                
                            <label for="form8">Direccion</label>
                            <input type="text" class="form-control" name="callenum" required>
                            <label for="form8">Servicio</label>
                            <input type="text" class="form-control" name="servicio" required>
                            <label for="form8">Sindicato</label>
                            <select name="sindicato" class="form-control" required>
                                <option value='' disabled selected>Selecciones una opcion</option>
                                <?php 
                                
                                foreach($sindicatos as $value){
                                    echo "<option value='".$value['NOMBRE']."'>".$value['NOMBRE']."</option>";
                                } //*/                                   
                                ?>
                            </select>    
                            <!--label for="form8">Sindicato</label>
                            <input type="text" class="form-control" name="sindicato" required-->
                            <label for="form8">Monto</label>
                            <input type="text" class="form-control" name="monto" required>
                            <label for="fechanac">Fecha de contratacion</label>
                            <input type="date" id="fechacon" name="condate" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-indigo">enviar</button>
                    </div>
                </form>
                
            
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
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>