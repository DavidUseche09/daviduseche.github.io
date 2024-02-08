<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST'){
//     header("Location: index.html" );
// }


$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$title = $_POST['title'];
$message = $_POST['message'];

if(!empty($mail) && !empty($name) && !empty($message){
    $to = 'daviduseche09@gmail.com';
    $asunto = 'Email de prueba';
    
    $body = <<<HTML
        <h1>Contact from the web site</h1>
        <p>From: $name $phone / $mail </p>
        <h2>Message</h2>
        $message
    HTML;

    $headers = "MIME-Version: 1.0 \r\n";
    $headers.= "Content-type: text/html; charset=utf-8 \r\n";
    $headers.= "From: $name $phone <$mail> \r\n";
    $headers.= "Return-path: $to \r\n";

    mail($to,$asunto,$body,$headers);

    echo "Email enviado correctamente";
})else{
    echo "Error al enviar el email";
}



// if( empty(trim($name)) ) $name = 'Unknown';
// $body = <<<HTML
//     <h1>Contact from the web site</h1>
//     <p>From: $name $phone / $mail </p>
//     <h2>Message</h2>
//     $message
// HTML;

// $headers = "MIME-Version: 1.0 \r\n";
// $headers.= "Content-type: text/html; charset=utf-8 \r\n";
// $headers.= "From: $name $phone <$mail> \r\n";
// $headers.= "To: <daviduseche09@gmail.com> \r\n";

// // $name .= "X-Mailer: PHP/" . phpversion() . " \r\n";
// // $name = "Mime-Version: 1.0 \r\n";
// // $name = "Content-Type: text/plain"; 

// $message = "This message was sent by: " . $name . " \r\n";
// $message .= "Phone number: " . $phone . " \r\n";
// $message .= "Email content: " . $mail . " \r\n";
// $message .= "Title: " . $title . " \r\n";
// $message .= "Message: " . $_POST['message'] . " \r\n";
// $message .= "Message Date: " . date('d/m/Y', time());

// // $para = 'daviduseche09@gmail.com'; 
// // $asunto = 'Message content';

// $rsta = mail('daviduseche09@gmail.com', "Message content: $title", $body, $headers);
// var_dump($rsta);

// header("Location:index.html")
?>
