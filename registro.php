<?php include("db.php");
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HUELLERO WIEDII</title>
<!-- BOOTSTRAP -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="#">
    <img src="./imagenes/wd.svg" width="90" height="30" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>

</nav>


<div class=login20>


    <?php if (!empty($message)) : ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <br>
    
    <div class="container-box">
  <div class="container">
    <div class="widget">
      <div class="fecha">
        <p id="diaSemana" class="diaSemana"></p>
        <p id="dia" class="dia"></p>
        <p>de </p>
        <p id="mes" class="mes"></p>
        <p>del </p>
        <p id="year" class="year"></p>
      </div>
    </div>
  </div>


  <div class="container2">
    <div class="widget">
      <div class="reloj">
        <p id="horas" class="horas"></p>
        <p>:</p>
        <p id="minutos" class="minutos"></p>
        <p>:</p>
        <div class="caja-segundos">
          <p id="segundos" class="segundos"></p>
          <p id="ampm" class="ampm"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- <div>

    <h3>Por Favor Ingrese Su Huella</h3>
    </div> -->

    <div class=imghuella>

      <img src="imagenes/huella.png" width="100px" height="100px">
    </div>
    
    <form action="enviarcorreo.php" method="POST">
      
      <input name="huella" type="password" autofocus="autofocus" id="huella" onblur="blurFunction()" 
      placeholder="Ingrese su Huella" required>
      <input class="botton-open" type="submit" name="operacion" value="Entrada">
      <script>
                       function blurFunction() {
                           document.getElementById("huella").focus();
                       }
                   </script>
      <div>
      <input class="botton-exit" type="submit" name="operacion" value="Salida">
      </div>

      <div>
      <button class="btn btn-primary" type="submit" name="operacion" value="Correo">Enviar Correo de Registro</button>
      </div>
    </form>
</div>


<script src="reloj.js"></script>  
      

</body>