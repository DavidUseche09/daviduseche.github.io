<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("Location: index.html" );
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMPT;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMPT.php';
require 'phpmailer/Exception.php';


$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$title = $_POST['title'];
$message = $_POST['message'];

if( empty(trim($name)) ) $name = 'Unknown';
$body = <<<HTML
    <h1>Contact from the web site</h1>
    <p>From: $name $phone / $mail </p>
    <h2>Message</h2>
    $message
HTML;

$mailer = new PHPMailer();
$mailer->setFrom($mail, "$name" );
$mailer->addAddress('daviduseche09@gmail.com', "David's Porfolio");
$mailer->Subject = "Message content: $title";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$rsta = $mailer->send( );

var_dump($rsta);