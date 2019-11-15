<?php

  include("db.php");
//   session_start();
 
  
  if (isset($_GET['id'])) {
       $id = $_GET['id'];
       $query = "DELETE FROM user WHERE id = $id";
       $result = mysqli_query($conn, $query);
       if (!$result) {
            die("Query Failed");

       }
       
       $_SESSION['message'] = "Usuario Eliminado Satisfactoriamente";
       $_SESSION['message_type'] = 'danger';
       header("Location: configuracion.php");

  }
?>