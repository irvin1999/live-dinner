<?php
require 'path/PHPMailer-master/src/PHPMailer.php'; // Reemplaza "path/to/PHPMailer" con la ruta correcta a PHPMailer en tu servidor

$errorMSG = "";

// Validación de los campos del formulario
if (empty($_POST["date"])) {
    $errorMSG = "Date is required ";
} else {
    $date = $_POST["date"];
}

// ... resto del código de validación de campos ...

// Dirección de correo electrónico de destino
$EmailTo = "11snaider99@gmail.com"; // Reemplaza "tucorreo@example.com" con tu dirección de correo electrónico

// Configuración del servidor SMTP de Nominalia
$smtpHost = 'bardiscoifb.com'; // Reemplaza con el servidor SMTP de Nominalia
$smtpUsername = '11snaider99@bardiscoifb.com'; // Reemplaza con tu dirección de correo electrónico
$smtpPassword = '@Atlantis11'; // Reemplaza con tu contraseña

// Crear instancia de PHPMailer
$mail = new PHPMailer;

// Configuración del servidor SMTP
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->Port = 587; // Puerto SMTP de Nominalia (puede variar, consulta la documentación)

// Configuración del mensaje
$mail->setFrom($smtpUsername, 'Nombre Remitente'); // Reemplaza 'Nombre Remitente' con el nombre que desees
$mail->addAddress($EmailTo);
$mail->Subject = 'Nuevo mensaje recibido';

// Contenido del mensaje
$mail->Body = "Date: $date\n"; // Agrega los demás campos del formulario según sea necesario

// Envío del correo electrónico
if (!$mail->send()) {
    $errorMSG = "Mailer Error: " . $mail->ErrorInfo;
}

// Redireccionar a una página de éxito o mostrar un mensaje de error
if (empty($errorMSG)) {
    echo "success";
} else {
    echo $errorMSG;
}
?>
