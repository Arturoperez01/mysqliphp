<?php
require __DIR__.'/bootstrap.php';
use Servicios\TokenServicio;
use Servicios\Container;
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recluta";

$conn = new mysqli($servername, $username, $password, $dbname);
//*/
$invalid = false;
$message = false;

session_start();

$container = new Container($configuration);
$tokenServicio = $container->getTokenServicio(); 
$autorizacionServicio = $container->getAutorizacionServicio(); 

//echo $_SESSION["username"];
/*
$token = isset($_SESSION["token"])?$_SESSION["token"]:false;
if($tokenServicio->checkToken($token)){
    header("Location: index.php");
}
//*/
if( $token = isset($_SESSION["token"])?$_SESSION["token"]:false){
  if($autorizacionServicio->checkToken($token)){
    header("Location: index.php");
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    foreach($_POST as $key => $value){
        $$key = $value;
        
        if($value==""){
            $invalid=true;
        };
    }

    if(!$invalid){
        $token = $tokenServicio->insertToken($username, $password);
        echo $token;
        if(!$token){
            $message = "error";
        }else{
            $_SESSION["token"]=$token;
            
            header("Location: index.php");
        }
    }
}


$conn = null;

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
          
    :host {
        display: flex;
        justify-content: center;
        margin: 100px 0px;
      }

      .mat-form-field {
        width: 100%;
        min-width: 300px;
      }

      .card,
      .card-content {
        display: flex;
        justify-content: center;
      }
  </style>
</head>

    <body class="container">
    <!-- Default form login -->
    
    <?php
    
    if($message){
        if($message=='error'){
            echo '<div class="alert alert-danger" role="alert">';
            echo 'El usuario o contraseña no concuerda';
            echo '</div>';
        }
        
    }      
        
    ?>
    <main class="page-wrapper">    
        <div class="p-5">
            <div class="card" >
            <!-- mdb-card-body-->
                <div class="card-body">
                    <!--alert></alert-->

                    <form class="text-center p-5" action="login.php" method="post">

                        <p class="h4 mb-4">Sign in</p>

                        <!-- Email -->
                        <input type="text" id="defaultLoginFormUsername" class="form-control mb-4" placeholder="Nombre del usuario" name="username">

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">

                        <!-- Sign in button -->
                        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    </form>
                </div>
            <!-- /mdb-card-body-->

            </div>
        </div>
    </main>
    <!-- Default form login -->
    </body>
    
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</html>