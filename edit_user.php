<?php
   include("db.php");
   include("includes/header.php");
   


   if(isset($_GET['id'])) {
       $id = $_GET['id'];
       $query = "SELECT * FROM user WHERE id = $id";
       $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result) == 1) {
           $row = mysqli_fetch_array($result);
           $nombre = $row['nombre'];
           $equipo = $row['equipo'];
           $correo = $row['correo'];
           $huella = $row['huella'];
           
       }

   }
    
   if (isset($_POST['update'])) {
       $id = $_GET['id'];
       $nombre = $_POST['nombre'];
       $equipo = $_POST['equipo'];
       $correo = $_POST['correo'];
       $huella = $_POST['huella'];

       $query = "UPDATE user set nombre = '$nombre', equipo = '$equipo', correo = '$correo', huella = '$huella' WHERE id = $id";
       mysqli_query($conn, $query);

       $_SESSION['message'] = 'El Usuario fue Actualizado Correctamente';
       $_SESSION['message_type'] = 'warning';
       header("location: configuracion.php");

   }

?>


<div class= "container p-14">
          <div class="row">
           <div class="col-md-14 mx-auto">
             <div class="card card-body">
                <form action= "edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                  <div class="form-group">
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                    class= "form-control" placeholder="Ingrese Nombre">
                  </div>

                  <div class="form-group">
                    <input type="text" name="equipo" value="<?php echo $equipo; ?>"
                    class= "form-control" placeholder="Ingrese Equipo">
                  </div>

                  <div class="form-group">
                    <input type="text" name="correo" value="<?php echo $correo; ?>"
                    class= "form-control" placeholder="Ingrese Correo">
                  </div>


                 <div class="form-group">
                     <textarea name="huella" rows="2" class="form-control" placeholder="Ingrese Huella"><?php echo $huella; ?></textarea>
                 </div>
                  <button class="btn btn-success" name="update">
                    Actualizar
                     
                  
                  </button>
              </form>
          </div>
        </div>
    </div>
</div>



