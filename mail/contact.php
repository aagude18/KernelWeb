<?php
// Configuración básica (ajusta según tu servidor)
$to = 'support@kernelsystem.net';
$from = 'kernelsystemsas@gmail.com';

// Sanitización más robusta utilizando filter_var_array
$input = filter_var_array($_POST, FILTER_SANITIZE_STRING);

// Extraer datos del formulario
$name = $input['name'];
$email = $input['email'];
$subject = $input['subject'];
$message = $input['message'];

// Crear el mensaje del correo
$body = "Nuevo mensaje desde tu sitio web.\n\n"
       . "Nombre: $name\n"
       . "Correo electrónico: $email\n\n"
       . "Mensaje:\n"
       . $message;

// Encabezados del correo (ajusta según tu configuración)
$headers = "From: $from\n";
$headers .= "Reply-To: $email\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/plain; charset=utf-8\n";

// Enviar el correo
if (mail($to, $subject, $body, $headers)) {
    // Correo enviado correctamente
    echo '¡Mensaje enviado con éxito!';
} else {
    // Error al enviar el correo
    echo 'Lo sentimos, ocurrió un error al enviar tu mensaje.';
}