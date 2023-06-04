<?php
// Recuperar los datos del formulario
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$time = $_POST["time"];
$person = $_POST["person"];

// Configuración de correo
$to = "11snaider99@gmail.com"; // Cambia esta línea con tu dirección de correo electrónico
$subject = "New Reservation";
$message = "Name: $name\n";
$message .= "Email: $email\n";
$message .= "Phone: $phone\n";
$message .= "Date: $date\n";
$message .= "Time: $time\n";
$message .= "Person: $person\n";
$headers = "From: $email";

// Envío del correo
$mailSent = mail($to, $subject, $message, $headers);

// Verificar si el correo se envió correctamente
if ($mailSent) {
    echo "success";
} else {
    echo "Error sending email.";
}
?>
