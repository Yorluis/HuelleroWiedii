<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';



$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                        
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'huellero.wd@gmail.com';            
    $mail->Password   = 'huellero12345';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
    $mail->Port       = 587;                               

    //Recipients
    $mail->setFrom('huellero.wd@gmail.com', 'Huellero Wiedii');
    $mail->addAddress('yorluis.vega@gmail.com');               
    $mail->addReplyTo('becerra.jesusantonio@gmail.com');
    $mail->addCC('yorluis.vega@wiedii.co');
    

    // Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Registro Huellero Wiedii';
    $mail->Body    = 'Hola este es un correo de Prueba, de su registro de huella <br><b>Registro de Huella Wiedii</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'El mensaje se envió correctamente';
} catch (Exception $e) {
    echo "Hubo un Error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>