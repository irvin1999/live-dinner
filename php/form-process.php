<?php
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['email'];
    $nombre = $_POST['name'];
    $mensaje = "Fecha: ".$_POST['date']."<br>"."Hora: ".$_POST['time']."<br>"."Personas: ".$_POST['person'];

    //echo $correo . " " . $nombre . " " . $mensaje;

    $destinatario = "11snaider99@gmail.com";
    $asunto = "Reserva de mesa"; 
    $cuerpo = '
        <html> 
            <head> 
                <title>Reserva de mesa</title> 
            </head>
            <body> 
                <h1>Reserva de mesa</h1>
                <p> 
                    Nombre: '.$nombre.'<br>
                    Correo: '.$correo.'<br>
                    Reserva:<br>'.$mensaje.' 
                </p> 
            </body>
        </html>
    ';
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF8\r\n"; 

    //dirección del remitente
    $headers .= "From: $nombre <$correo>\r\n";
    
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Correo enviado";
    } else {
        echo "Error al enviar el correo";
    }
}
?>
<a href="reservation.html">Volver a inicio</a>
