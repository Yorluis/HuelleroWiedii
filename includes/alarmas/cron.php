<?php include "../../db.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/Exception.php';
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
$nameuser = '';
$mailuser = '';
$HOST = 'smtp.gmail.com';
$USERNAMECORREO = 'huellero.wd@gmail.com';
$PASSWORDC = 'huellero12345';
$NAMEC = 'Huellero Wiedii';
$PORTC = 587;
$bodymesage = 'hola';
$subjectmsg = 'Registro huellero';
$altbodymsg = 'Registro exitoso';
$mailusercc = 'huellero.wd@gmail.com';

// $nameuser = 'Huellero';
// $mailuser = 'yorluis.vega@wiedii.co';


$query = "SELECT id, TIMEDIFF(CURTIME(), hora_entrada), TIMEDIFF(CURTIME(), hora_salida), 
TIMEDIFF(CURTIME(), hora_almuerzo_salid),TIMEDIFF(CURTIME(), hora_almuerzo_ent)
FROM user u";
        
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_user = $row['id'];
        $diff_entry = $row['TIMEDIFF(CURTIME(), hora_entrada)'];
        $diff_departure = $row['TIMEDIFF(CURTIME(), hora_salida)'];
        $diff_d_lunch = $row['TIMEDIFF(CURTIME(), hora_almuerzo_ent)'];
        $diff_e_lunch = $row['TIMEDIFF(CURTIME(), hora_almuerzo_salid)'];
        

        $query = "SELECT COUNT(fecha) AS total 
                    FROM registro 
                    WHERE id='$iduser' 
                    and fecha=CURDATE()";
        $resultm = mysqli_query($conn, $query);
        $var = mysqli_fetch_assoc($resultm);
        $num = $var['total'];
        $querydata = "SELECT nombre, correo 
                    FROM user
                    WHERE id='$id_user'";
        $resultd = mysqli_query($conn, $querydata);
        $rowd = mysqli_fetch_assoc($resultd);
        $nameuser = $rowd['nombre'];
        $mailuser = $rowd['correo'];
        
        if ($num == 0) {
            if (!empty($diff_entry) &&  $diff_entry<='00:20:00') {
                $correo = 'si';
                $bodymesage = 'El dia de hoy no ha ingresado la huella '
                    . date("d/m/Y");
            } else {
                $correo = 'no';
            }
        }
        else {
            $query = "SELECT  hora_salida 
                            FROM registro 
                            WHERE id= '$iduser'
                            and fecha=CURDATE()  
                            GROUP BY hora_salida
                            ORDER BY hora_salida DESC LIMIT 1";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $t_out = $row['hora_salida'];
            if (empty($t_out)) {
                if (!empty($diff_e_lunch) && $diff_e_lunch <= '00:10:00' && $diff_e_lunch >= '-00:10:00') {
                    $correo = 'si';
                    $bodymesage = 'No se le olvide registrar la huella para salir a almorzar '
                        . date("d/m/Y");
                } elseif (
                    !empty($diff_departure) &&  $diff_departure <= '00:10:00' &&
                    $diff_departure >= '-00:10:00'
                ) {
                    $correo = 'si';
                    $bodymesage = 'No se le olvide registrar la huella al salir '
                        . date("d/m/Y");
                }
                else {$correo= 'no'; }
            } else {
                if (!empty($diff_d_lunch) && $diff_d_lunch <= '00:10:00' && $diff_d_lunch >= '-00:10:00') {
                    $correo = 'si';
                    $bodymesage = 'No se le olvide registrar la huella que acaba de llegar de almorzar '
                        . date("d/m/Y");
                }
            }
        }
        switch ($correo) {
            case 'si':
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
                                echo "<script>alert('El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}');
                                            window.history.back()</script>";
                            }
                break;
                case 'no':
                  echo "No se envío";
                break;
        }
    }
} else {
    echo 'no funciona';
}

?>