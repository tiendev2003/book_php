<?php

require 'PHPMailer/src/DSNConfigurator.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuthTokenProvider.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail {

    public function sendMailByAddress($address, $name, $title, $content)
    {
        $mail = new PHPMailer(false);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                  
            $mail->Host       = 'smtp.gmail.com';           
            $mail->SMTPAuth   = true;                        
            $mail->Username   = '';                 
            $mail->Password   = '';                           
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      
            $mail->Port       = 587;                                 
            $mail->SMTPSecure = "tls";                               
            $mail->CharSet    = "UTF-8";

            $mail->setFrom('cuahangsach021@gmail.com', 'Sach021');
            $mail->addAddress($address, $name);   

            $mail->isHTML(true);                         
            $mail->Subject = $title;
            $mail->Body    = $content;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
}

