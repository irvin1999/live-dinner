<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga la biblioteca PHPMailer
require 'C:/xampp/htdocs/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/PHPMailer-master/src/SMTP.php';

$errorMSG = "";

// Check if all required fields are filled
if (empty($_POST["date"]) || empty($_POST["time"]) || empty($_POST["person"]) || empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
    $errorMSG = "Please fill out all fields";
} else {
    // Get the form data
    $date = $_POST["date"];
    $time = $_POST["time"];
    $person = $_POST["person"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Prepare email subject and body
    $to = "11snaider99@gmail.com"; // Replace with your email address
    $subject = "New Reservation";
    $message = "Date: $date\n";
    $message .= "Time: $time\n";
    $message .= "Number of Persons: $person\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // SMTP configuration (replace with your own)
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // Replace with your email address
    $mail->Password = 'your-email-password'; // Replace with your email password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the email headers
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        echo "success";
    } else {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
    exit(); // Terminates the script after sending the email response
}
?>
