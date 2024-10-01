<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que tienes el autoload de Composer


include('conexion.php');
$conexion = conexion();

// correo donde enviaremos el codigo
$email = "javier@gmaail.com";


$codigo_recuperacion = rand(100000, 999999);

$url_recuperacion = "http://localhost/biblioteca/login.php";

$mail = new PHPMailer();
try {
    // Configuración del servidor SMTP de Mailtrap
    $mail->isSMTP();                                      // Usar SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';          // Servidor SMTP de Mailtrap para ambiente en vivo
    $mail->SMTPAuth   = true;                             // Habilitar autenticación SMTP
    $mail->Username   = 'f782c9d9ca78ea';                            // Usuario SMTP (credencial de Mailtrap)
    $mail->Password   = '2405c630681498'; // Contraseña SMTP (credencial de Mailtrap)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilitar encriptación TLS
    $mail->Port       = 2525;                              // Puerto SMTP

    // Remitente y destinatario
    $mail->setFrom('jmenachop@fcpn.edu.bo', 'XA VI');   // Remitente
    $mail->addAddress($email, 'Correo de recueracion'); // Destinatario

    // Contenido del correo
    $mail->isHTML(true);                                  // Configurar el formato de correo a HTML
    $mail->Subject = 'Recuperacion de contrasena';
    // Asegúrate de establecer la codificación de caracteres a UTF-8
    $mail->CharSet = 'UTF-8';

    $mail->Body    = '<p>Hola,</p>
                      <p>Hemos recibido una solicitud para recuperar tu contraseña. Por favor, ingresa el siguiente código en la página de recuperación:</p>
                      <p><strong>' . $codigo_recuperacion . '</strong></p>
                      <p>O haz clic en el siguiente enlace para ingresar el código:</p>
                      <p><a href="' . $url_recuperacion . '">Ir a la página de recuperación</a></p>';

    $mail->AltBody = 'Este es el cuerpo alternativo en texto plano para clientes que no soportan HTML';

    // Enviar correo
    $mail->send();
    echo 'El correo ha sido enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
