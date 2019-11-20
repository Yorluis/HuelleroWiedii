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
        $query = "SELECT * FROM user WHERE huella=$huella";
        $resultmail = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($resultmail);

        $mailuser = $row['correo'];
        $nameuser = $row['nombre'];
        $mailusercc = 'huellero.wd@gmail.com';
        $subjectmsg = 'Registro huellero';
    if (mysqli_num_rows($resultmail)==1){
        switch ($n) {
            case Entrada:
                $bodymsg = 'Usted ha registrado su huella correctamente. 
                <br>
                <br>
                <u><strong>ENTRADA A LA EMPRESA:</strong></u>'
                .date(" h:i:s a - d M Y").'
                <br>
                <br>
                Que tenga un Excelente Dia.';
                $altbodymsg = 'Entrada satisfactoria';
                $alertmsg = "<script>
                    alert('Ha registrado de forma correcta su Entrada');location.href='registro.php'</script>";
                break;
            case Salida:
                $bodymsg = 'Usted ha registrado su huella correctamente.
                <br>
                <br>
                <u><strong>SALIDA DE LA EMPRESA:</strong></u>'
                .date(" h:i:s a - d M Y").'
                <br> 
                <br>Que tenga un Excelente Dia.';
                $altbodymsg = 'Salida satisfactoria';
                $alertmsg = "<script>
                    alert('Ha registrado de forma correcta su Salida');location.href='registro.php'</script>";
                break;
            
        }

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
    $mail->Body    = $bodymsg;
    $mail->AltBody = $altbodymsg;
    $mail->send();
    echo $alertmsg;
} catch (Exception $e) {
    echo "<script>alert('El mensaje no pudo ser Enviado. Mailer Error: {$mail->ErrorInfo}');
    window.history.back()</script>";
}
    // }  echo "<script>alert('La Huella no Existe');
    // window.history.back()</script>";
}else {
    // header("Location: registro.php?status=1");
   
   echo 'La huella no existe';
    header("Location: registro.php");
}

    }
}

// echo "<script>
// alert('Debe ingresar una Huella');location.href='registro.php'</script>";

?>