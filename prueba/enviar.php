<?php

    $destino = "kristian.espitia@pensemossi.com";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];
    $contenido = "Nombre:"  . $nombre . "\nCorreo:" . $correo . "\nTelefono" . $telefono . "n\Mensaje" . $mensaje;
    mail($destino,"Contacto", $contenido);
    header("Location:gracias.html");

?>