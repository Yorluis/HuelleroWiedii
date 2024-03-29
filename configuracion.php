<?php
include("db.php");

session_start();

if (!isset($_SESSION['user_id'])) {
   header('location: log.php');
}


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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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
         
         <li class="nav-item">
            <a class="nav-link" href="login.php">Salir</a>
         </li>

      </ul>
   </div>

</nav>

<div class="container p-4">

   <div class="row">

      <div class="col-md-4">

         <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> 
                alert-dismissible fade show" role="alert">
               <?= $_SESSION['message'] ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

         <?php unset($_SESSION['message']); } ?>

         <div class="card card-body">
            <form action="save_user.php" method="POST">
               <div class="form-group">
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" required autofocus>
               </div>

               <div class="form-group">
                  <input type="text" name="equipo" class="form-control" placeholder="Ingrese Equipo" required autofocus>
               </div>

               <div class="form-group">
                  <input type="text" name="correo" class="form-control" placeholder="Ingrese Correo" required autofocus>
               </div>

               <div class="form-group">
                  <textarea name="huella" rows="2" class="form-control" placeholder="Ingrese Huella"
                  required autofocus></textarea>
               </div>

               <div class="form-group">
                  <input type="text" name="hora_entrada" class="form-control" placeholder="Ingrese la hora de entrada" 
                  required autofocus>
               </div>

               <div class="form-group">
                  <input type="text" name="hora_almuerzo_salid" class="form-control" 
                  placeholder="Ingrese la hora de salida de almuerzo" required autofocus>
               </div>

               <div class="form-group">
                  <input type="text" name="hora_almuerzo_ent" class="form-control" 
                  placeholder="Ingrese la hora de entrada de almuerzo" required autofocus>
               </div>

               <div class="form-group">
                  <input type="text" name="hora_salida" class="form-control" 
                  placeholder="Ingrese la hora de salida" required autofocus>
               </div>

               <input type="submit" class="btn btn-success btn-block" name="save_user" value="Guardar Usuario">

            </form>
         </div>

      </div>


      <div class="col-md-8">

         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Equipo</th>
                  <th>Correo</th>
                  <th>Huella</th>
                  <th>Hora Entrada</th>
                  <th>Hora Salida Almuerzo</th>
                  <th>Hora Entrada Almuerzo</th>
                  <th>Hora Salida</th>
                  <th>F_Creación</th>
                  <th>Acción</th>
               </tr>
            </thead>
            <tbody>


               <?php
               $query = "SELECT * FROM user";
               $result_user = mysqli_query($conn, $query);

               while ($row = mysqli_fetch_array($result_user)) { ?>

                  <tr>
                     <td><?php echo $row['nombre'] ?></td>
                     <td><?php echo $row['equipo'] ?></td>
                     <td><?php echo $row['correo'] ?></td>
                     <td><?php echo $row['huella'] ?></td>
                     <td><?php echo $row['hora_entrada'] ?></td>
                     <td><?php echo $row['hora_almuerzo_salid'] ?></td>
                     <td><?php echo $row['hora_almuerzo_ent'] ?></td>
                     <td><?php echo $row['hora_salida'] ?></td>
                     <td><?php echo $row['f_creacion'] ?></td>

                     <td>
                        <a href="edit_user.php?id=<?php echo $row['id'] ?>" class="btn 
                             btn-secondary">
                           <i class="fas fa-marker"></i>


                        </a>
                        <a href="delete_user.php?id=<?php echo $row['id'] ?>" class="btn 
                             btn-danger">

                           <i class="far fa-trash-alt"></i>
                        </a>
                     </td>
                  </tr>

               <?php } ?>

            </tbody>
         </table>

      </div>

   </div>

</div>

</body>