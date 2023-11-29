<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include './config/PHPMailer/src/Exception.php';
include './config/PHPMailer/src/PHPMailer.php';
include './config/PHPMailer/src/SMTP.php';

function sendMail($body, $to, $from){

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'phinhpc05786@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'cozegjhaxmzonlss';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        $mail->setFrom($to , 'Mailer');
        $mail->addAddress($from, 'Joe User');     //Add a recipient
        $mail->isHTML(true);


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Tên cửa hàng";
        $mail->Body    = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {        
        echo "Error: " . $mail->ErrorInfo;
    }
}



if(isset($_POST['email'])){
    $to  = "phinhpc05786@fpt.edu.vn";
    $from = $_POST['email'];
    $user = new KhachHang();
    $database = $user->user_select_by_email($_POST['email']);
    $body = $body = '<div style="background-color: #f5f5f5; padding: 20px;">
    <h2 style="color: #333333;">Xin chào!</h2>
    <p style="color: #555555;">Dưới đây là mã token của bạn:</p>
    <p style="font-size: 24px; font-weight: bold; color: #007bff;">'.$database['token'].'</p>
    <p style="color: #555555;">Xin cảm ơn!</p>
  </div>';
    sendMail($body, $to, $from);
}
