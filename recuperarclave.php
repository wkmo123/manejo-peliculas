<?php
// Varios destinatarios
$para  = 'aidan@example.com' . ', '; // atención a la coma
$para .= 'wez@example.com';

// título
$título = 'Restablecer password CineUD';
$codigo = rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecler password</title>
</head>
<body>
  <h1>CineUD</h1>
  <div style="text-align: center; background-color:#ccc">
    <p>Restablecer contraseña</p>
    <h3>'.$codigo.'</h3>
    <p>Si usted no envio este codigo porfavor omitirlo</p>
  </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
