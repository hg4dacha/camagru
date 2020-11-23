<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';

function sendmail($mailAdress, $subject, $body, $id_image)
{
    $mail = new PHPMailer(true);

    try
    {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'camagru042@gmail.com';
        $mail->Password   = '240urgamac';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('ne_pas_repondre@camagru.com', 'Camagru Administrator');
        $mail->addAddress($mailAdress);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->AddEmbeddedImage('../public/pictures/Camagru.png', 'logo');
        if ($id_image != NULL) {
            $mail->AddEmbeddedImage('../public/users_pictures/'.$id_image.'.jpeg', 'user_image');
        }
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->send();
        // for more information : https://github.com/PHPMailer/PHPMailer
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>