<?php
include("db.php");
include("includes/header.php");



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM user WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $equipo = $row['equipo'];
    $correo = $row['correo'];
    $huella = $row['huella'];
    $hora_entrada = $row['hora_entrada'];
    $hora_almuerzo_salid = $row['hora_almuerzo_salid'];
    $hora_almuerzo_ent = $row['hora_almuerzo_ent'];
    $hora_salida = $row['hora_salida'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $equipo = $_POST['equipo'];
  $correo = $_POST['correo'];
  $huella = $_POST['huella'];
  $hora_entrada = $_POST['hora_entrada'];
  $hora_almuerzo_salid = $_POST['hora_almuerzo_salid'];
  $hora_almuerzo_ent = $_POST['hora_almuerzo_ent'];
  $hora_salida = $_POST['hora_salida'];

  $query = "UPDATE user set nombre = '$nombre', equipo = '$equipo', correo = '$correo', huella = '$huella',
  hora_entrada = '$hora_entrada', hora_almuerzo_salid = '$hora_almuerzo_salid', 
  hora_almuerzo_ent = '$hora_almuerzo_ent', hora_salida = '$hora_salida'
       WHERE id = $id";
  mysqli_query($conn, $query);

  $_SESSION['message'] = 'El Usuario fue Actualizado Correctamente';
  $_SESSION['message_type'] = 'warning';
  header("location: configuracion.php");
}


?>


<div class="container p-14">
  <div class="row">
    <div class="col-md-14 mx-auto">
      <div class="card card-body">
        <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" 
            placeholder="Ingrese Nombre" required autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="equipo" value="<?php echo $equipo; ?>" class="form-control" 
            placeholder="Ingrese Equipo" required autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="correo" value="<?php echo $correo; ?>" class="form-control" 
            placeholder="Ingrese Correo" required autofocus>
          </div>

          <div class="form-group">
            <textarea name="huella" rows="2" class="form-control" 
            placeholder="Ingrese Huella" required autofocus><?php echo $huella; ?></textarea>
          </div>

          <div class="form-group">
            <input type="text" name="hora_entrada" value="<?php echo $hora_entrada; ?>" class="form-control" 
            placeholder="Ingrese Hora de Entrada" required autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="hora_almuerzo_salid" value="<?php echo $hora_almuerzo_salid; ?>" 
            class="form-control" 
            placeholder="Ingrese Hora de Salida de Almuerzo" required autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="hora_almuerzo_ent" value="<?php echo $hora_almuerzo_ent;?>" class="form-control" 
            placeholder="Ingrese Hora de Entrada de Almuerzo" required autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="hora_salida" value="<?php echo $hora_salida;?>" class="form-control" 
            placeholder="Ingrese Hora de Salida" required autofocus>
          </div>

          <button class="btn btn-success" name="update">
            Actualizar


          </button>
        </form>
      </div>
    </div>
  </div>
</div>