<?php

include("db.php");
session_start();


if (isset($_POST['save_user'])){
    $nombre = $_POST['nombre'];
    $equipo = $_POST['equipo'];
    $correo = $_POST['correo'];
    $huella = $_POST['huella'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_almuerzo_salid = $_POST['hora_almuerzo_salid'];
    $hora_almuerzo_ent = $_POST['hora_almuerzo_ent'];
    $hora_salida = $_POST['hora_salida'];

    
   

     $query = "INSERT INTO user(nombre, equipo, correo, huella, hora_entrada, hora_almuerzo_salid, 
     hora_almuerzo_ent, hora_salida) VALUES ('$nombre', '$equipo', '$correo', '$huella', '$hora_entrada',
     '$hora_almuerzo_salid', '$hora_almuerzo_ent', '$hora_salida')"; 
     
     $result = mysqli_query($conn, $query);

    if (!$result) {
        
      $_SESSION['message'] = 'Ya existe un Usuario con la misma Huella o Nombre';
    $_SESSION['message_type'] = 'danger';

    header("Location: configuracion.php");
        
        
    } else{

    $_SESSION['message'] = 'Usuario Guardado Satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: configuracion.php");
  } 

}

?>