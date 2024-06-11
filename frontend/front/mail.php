<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$tipo = $_POST['tipo'];
$whatsapp = $_POST['whatsapp'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.proyectoswozial.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testeolocal@proyectoswozial.com';                     //SMTP username
    $mail->Password   = 'D(]$I6s7)vBV';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('testeolocal@proyectoswozial.com', 'Mailer');
    $mail->addAddress('mikeed1998@gmail.com', 'Michael User');     //Add a recipient
    $mail->addAddress('michaelwozial@gmail.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'silogisticaguerrero - Mensaje';
    $mail->Body    = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .content {
                    margin-bottom: 20px;
                }
                .content h2 {
                    margin-bottom: 10px;
                    font-size: 18px;
                    color: #333;
                }
                .content p {
                    margin: 5px 0;
                }
                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #999;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    ";
                    
                    if ($tipo == 'contacto') {
                        $mail->Body .= "<h1>silogisticaguerrero - Formulario de Contacto</h1>";
                    } else {
                        $mail->Body .= "<h1>silogisticaguerrero - Formulario de Home</h1>";
                    } 

                    $mail->Body .= "
                </div>
                <div class='content'>
                    ".
                        "<h2>Detalles del mensaje</h2>"
                    .
                        (($tipo == 'contacto') ? "<p><strong>Nombre:</strong> $nombre</p>"  : "")
                    ."
                    ".
                        (($tipo == 'contacto') ? "<p><strong>Empresa:</strong> $empresa</p>"  : "")
                    .
                        "<p><strong>Whatsapp:</strong> $whatsapp</p>"
                    ."
                    ".
                        "<p><strong>Email:</strong> $email</p>"
                    ."
                    ".
                        "<p><strong>Mensaje:</strong><br>$mensaje</p>"
                    ."
                    ".
                      
                    "
                </div>
                <div class='footer'>
                    <p>Este correo fue enviado desde el formulario para contizar un producto en silogisticaguerrero.com</p>
                </div>
            </div>
        </body>
        </html>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $location = ($tipo == 'contacto') ? 'Contacto' : 'Home';
    header('Location: '.$location.'?status=success');
    exit;
} catch (Exception $e) {
    header('Location: Contacto?status=error&message='.urlencode($mail->ErrorInfo));
    exit;
}