<?php
$errorMSG = "";

// Validación de los campos del formulario
if (empty($_POST["date"])) {
    $errorMSG = "Date is required ";
} else {
    $date = $_POST["date"];
}

if (empty($_POST["time"])) {
    $errorMSG .= "Time is required ";
} else {
    $time = $_POST["time"];
}

if (empty($_POST["person"])) {
    $errorMSG .= "Person is required ";
} else {
    $person = $_POST["person"];
}

if (empty($_POST["name"])) {
    $errorMSG .= "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["phone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $phone = $_POST["phone"];
}

// Dirección de correo electrónico de destino
$EmailTo = "11snaider99@gmail.com";
$Subject = "New Table Booking";

// Preparar el cuerpo del correo electrónico
$Body = "";
$Body .= "Date: ";
$Body .= $date;
$Body .= "\n";
$Body .= "Time: ";
$Body .= $time;
$Body .= "\n";
$Body .= "Person: ";
$Body .= $person;
$Body .= "\n";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";

// Enviar el correo electrónico
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// Redireccionar a una página de éxito
if ($success && $errorMSG == ""){
    echo "success";
} else {
    if ($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
