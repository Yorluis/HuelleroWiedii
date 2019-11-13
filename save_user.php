<?php

include("db.php");

if (isset($_POST['save_user'])){
    $nombre = $_POST['nombre'];
    $equipo = $_POST['equipo'];
    $correo = $_POST['correo'];
    $huella = $_POST['huella'];

    
   

     $query = "INSERT INTO user(nombre, equipo, correo, huella) VALUES ('$nombre', '$equipo', '$correo', '$huella')"; 
     
     $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<script> alert('Usuario ya Registrado con la misma Huella');window.history.back()</script>");
        
        
    }

    $_SESSION['message'] = 'Usuario Guardado Satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: configuracion.php");

}

?>