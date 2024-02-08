<?php

session_start();

require_once 'vendor/autoload.php';
$firstName = $_SESSION['firstname'];
$email = $_SESSION['email'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mujicnatasa99@gmail.com';
    $mail->Password = 'm r y k c u s w d d d l x n h t';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPDebug = 2;

    //Recipients
    $mail->setFrom('mujicnatasa99@gmail.com', 'Natasa Mujic');
    $mail->addAddress($_SESSION['email'], $_SESSION['firstname']);


    $activationCode = md5(uniqid(rand(), true));

    $encodedActivationCode = urlencode($activationCode);
    $mail->isHTML(true);
    $mail->Subject = 'Activation Account';
    $mail->Body = "Click the following link to activate your account: <a href='http://localhost:80/hairdresser_project/activate-stylist.php?code=" . urlencode($encodedActivationCode) .  "'>Activate</a>";

    $mail->send();
    echo "<script> alert('Account created! Please check your email to activate your account.');</script>";

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


