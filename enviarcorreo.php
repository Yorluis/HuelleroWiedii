<?php

include("db.php");
date_default_timezone_set('America/Bogota');
session_start();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$HOST = 'smtp.gmail.com';
$USERNAMECORREO = 'huellero.wd@gmail.com';
$PASSWORDC = 'huellero12345';
$NAMEC = 'Huellero Wiedii';
$PORTC = 587;
$n = $_POST['operacion'];
$huella = $_POST['huella'];

if (!empty($huella)) {
    if (isset($_POST['operacion'])) {
        $query = "SELECT * FROM user WHERE huella='$huella'";
        $resultmail = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($resultmail);

        $mailuser = $row['correo'];
        $nameuser = $row['nombre'];
        $iduser = $row['id'];
        $mailusercc = 'huellero.wd@gmail.com';
        $subjectmsg = 'Registro huellero';
        
    if (mysqli_num_rows($resultmail)==1){
        switch ($n) {
            case Entrada:
                $getin = "INSERT INTO registro (fecha, hora_entrada, id)
                VALUES (CURDATE(), CURTIME(), '$iduser')";
                $result = mysqli_query($conn, $getin);
                // $bodymsg = 'Usted ha registrado su huella correctamente. 
                // <br>
                // <br>
                // <u><strong>ENTRADA A LA EMPRESA:</strong></u>'
                // .date(" h:i:s a - d M Y").'
                // <br>
                // <br>
                // Que tenga un Excelente Dia.';
                // $altbodymsg = 'Entrada satisfactoria';
                // $alertmsg = "<script>
                //     alert('Ha registrado de forma correcta su Entrada');location.href='registro.php'</script>";
                // echo "<script>
                //     alert('Ha registrado de forma correcta su Entrada');location.href='registro.php'</script>";
                $_SESSION['message'] = 'Se ha Registrado su Entrada ' .$nameuser;
                $_SESSION['message_type'] = 'success';
            
                header("Location: registro.php");
                break;
            case Salida:
                $getin = "INSERT INTO registro (fecha, hora_salida, id)
                VALUES (CURDATE(), CURTIME(), '$iduser')";
                $result = mysqli_query($conn, $getin);
                // $bodymsg = 'Usted ha registrado su huella correctamente.
                // <br>
                // <br>
                // <u><strong>SALIDA DE LA EMPRESA:</strong></u>'
                // .date(" h:i:s a - d M Y").'
                // <br> 
                // <br>Que tenga un Excelente Dia.';
                // $altbodymsg = 'Salida satisfactoria';
                // $alertmsg = "<script>
                //     alert('Ha registrado de forma correcta su Salida');location.href='registro.php'</script>";
                // echo "<script>
                //     alert('Ha registrado de forma correcta su Salida');location.href='registro.php'</script>";
                $_SESSION['message'] = 'Se ha Registrado su Salida ' .$nameuser;
                $_SESSION['message_type'] = 'success';
            
                header("Location: registro.php");
                break;
             case Correo:
                $query = "SELECT  fecha, hora_entrada, hora_salida  
                FROM registro 
                WHERE id= '$iduser'
                and fecha <= CURDATE() and fecha >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)
                GROUP BY  fecha, hora_entrada, hora_salida  
                ORDER BY fecha DESC";
                $result = mysqli_query($conn, $query);
    
                $bodymesage = 'Este es el informe de las entradas y salidas de los ultimos 15 dias: 
                    ' . $nameuser . ' 
                    <br><br>
                <table class="table table-bordered" style="font-size: 1vw;"id="tablausu">
                    <thead>
                    <tr>
                        <th>Fecha de ingreso</th>
                        <th>Hora de ingreso</th>
                        <th>Hora de salida</th>
                    </tr> </thead>
                    <tbody>
                    ';
                while ($row = mysqli_fetch_assoc($result)) {
                    $bodymesage .= '
                        <tr>
                            <td>' . $row['fecha'] . '</td>
                            <td>' . $row['hora_entrada'] . '</td>
                            <td>' . $row['hora_salida'] . '</td>
                        </tr>';
                }
                $bodymesage .= '</tbody></table>';
                // $alertmsg = "<script>
                // alert('Su registro se ha enviado de forma correcta');location.href='registro.php'</script>";
                $_SESSION['message'] = 'Su registro se ha enviado de forma correcta ' .$nameuser;
                $_SESSION['message_type'] = 'success';
            
                header("Location: registro.php");

                $mail = new PHPMailer(true);

try {
    
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                        
    $mail->Host       = $HOST;                   
    $mail->SMTPAuth   = true;                               
    $mail->Username   = $USERNAMECORREO;            
    $mail->Password   = $PASSWORDC;                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
    $mail->Port       = $PORTC;                               
    $mail->setFrom($USERNAMECORREO, $NAMEC);
    $mail->addAddress($mailuser, $nameuser);               
    $mail->addCC($mailusercc);
    $mail->isHTML(true);                                 
    $mail->Subject = $subjectmsg;
    $mail->Body    = $bodymesage;
    $mail->AltBody = $altbodymsg;
    $mail->send();
    echo $alertmsg;
} catch (Exception $e) {
    echo "<script>alert('El mensaje no pudo ser Enviado. Mailer Error: {$mail->ErrorInfo}');
    window.history.back()</script>";
}
                break;
            
        }


    }  else {
      $_SESSION['message'] = 'La Huella no Existe';
                $_SESSION['message_type'] = 'danger';
            
                header("Location: registro.php");
    }
}

    }


?>