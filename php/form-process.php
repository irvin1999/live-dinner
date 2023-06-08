<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $date = $_POST["date"];
    $time = $_POST["time"];
    $person = $_POST["person"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Configura los detalles del correo electrónico
    $to = "11snaider99@gmail.com";
    $subject = "Reserva de mesa";
    $message = "Fecha: " . $date . "\n";
    $message .= "Hora: " . $time . "\n";
    $message .= "Número de personas: " . $person . "\n";
    $message .= "Nombre: " . $name . "\n";
    $message .= "Correo electrónico: " . $email . "\n";
    $message .= "Teléfono: " . $phone . "\n";
    $headers = "From: " . $email;

    // Envía el correo electrónico
    if (mail($to, $subject, $message, $headers)) {
        echo "¡Gracias por reservar! Te contactaremos pronto.";
    } else {
        echo "Error al enviar el formulario. Por favor, inténtalo de nuevo.";
    }
}
?>
