<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(!empty($_POST['email'])) {

if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo "Please provide a valid email-id";
    return;
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$msg = $_POST['message'];

$phone = isset($_POST['phone']) ? $_POST['phone'] : 'NGO.';



    
    

$mail = new PHPMailer(true); 
try {
  
    $mail->isSMTP();    
                                     
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;                              
    $mail->Username = 'mailsendingemail@gmail.com';               
    $mail->Password = '@#Inazuma11';                           
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 587;                                   
   
    $mail->setFrom('mailsendingemail@gmail.com', 'NGO.');
    $mail->addAddress('mailsendingemail@gmail.com');     
    $mail->isHTML(true); 
    $mail->Body.='<html lang="en">';
    $mail->Body.='<head>';
    $mail->Body.='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
    $mail->Body.='</head>';
    $mail->Body.='<body style="font-family: candara;height:auto;">';    
    $mail->Body.='<div style="background-color: #8a2be2; padding:1%;margin:0;border-radius:2px">';
    $mail->Body.='<p style="color: #fff; text-align: center; font-size: 45px;font-weight:600;margin:0">Welcome to <span style="font-size:55px">NGO.</span></p>';
    $mail->Body.='</div>';
    $mail->Body.='<div style="border: 5px solid #8a2be2; border-top: none;">';
    $mail->Body.='<div style="padding: 1% 3%;margin: 0 0 1% 0">';
    $mail->Body.='<p style="font-size: 25px;text-align: center;text-transform:capitalize;font-weight: 800;margin:0">Contact Form</p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Hello </strong>NGO.,</p>';
    $mail->Body.='<p style="font-size: 16px;">Someone has tried to contact NGO. team.</p>';
    $mail->Body.='<p style="font-size: 16px;">Name:'.@$name.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Email:'.@$email.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Phone:'.@$phone.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Subject:'.@$subject.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Message Detail:'.@$msg.'</p>';

    $mail->Body.='<p style="font-size: 16px;">Cheers!</p>';
    $mail->Body.='<p style="font-size: 16px;">NGO.</p>';
    $mail->Body.='</div>';
    $mail->Body.='</div>';
    $mail->Body.='</body>';
    $mail->Body.='</html>';
    $mail->Subject = 'NGO.';
    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}else{
    echo "mail not provide";
}
?>