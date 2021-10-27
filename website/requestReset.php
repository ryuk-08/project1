<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config/connect.php';

if(isset($_POST["reset"])){

    $emailTo = $_POST['email'];

    $code = uniqid(true);

    $query = mysqli_query($conn, "INSERT INTO resetPasswords(email, code) VALUES('$emailTo', '$code')");
    if(!$query){
        exit("Error");
    }
    $mail = new PHPMailer(true);
try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "csproject37@gmail.com";
    $mail->Password = "hj8d3pta";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465; 

    $mail->setFrom('csproject37@gmail.com');
    $mail->addAddress($emailTo);
    $mail->addReplyTo("no-reply@gmail.com", "No reply");

    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/changePassword.php?code=$code"; 
    $mail->isHTML(true);
    $mail->Subject = 'Reset your password';
    $mail->Body = "<p>We received a password reset request. To reset your password click
    <a href = '$url'> here.</a></p>";

    $mail->send();
        echo 'Check your email for a link to reset your password.';
  
}catch (Exception $e){
    echo "Message could not be sent. Mail error: {$mail->ErrorInfo}";
}
  exit();
}