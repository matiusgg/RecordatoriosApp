<?php

require_once '../vendor/autoload.php';
use models\{Conexion};

// FORMULARIO: INPUT NOMBRE, EMAIL Y COMENTARIO
// CREAR TABLA CON ATRIBUTOS ID, NOMBRE, EMAIL, COMENTARIO, CREATE, UPDATE, ACTIVO


// require_once 'php/conexion';

if((isset($_POST['nombre'])) && (isset($_POST['mail'])) && (isset($_POST['comentario']))) {

    // $atributos = 'nombre VARCHAR(25) NOT NULL,',
    // 'apellidos VARCHAR(50) NOT NULL,',
    // 'poblacion VARCHAR(25) NOT NULL';

    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $comentario = $_POST['comentario'];


    $Contactar = [
        'nombre' => $nombre,
        'mail' => $mail,
        'comentario' => $comentario
    ];

    

    $atributosContactar = 
    "nombre VARCHAR(30) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    comentario TEXT,
    active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

// CREAMOS LA BASE DE DATOS MEDIANTE ESTE OBJETO Y PORQUE EN EL CONSTRUCTOR IGUALAMOS LA PROPIEDAD CON EL MYSQLI
    $contacto = new Conexion('localhost', 'root', '', 'recordatorios');
    $contacto->CrearTabla('contactar', $atributosContactar);
   $contacto->InsertarTupla('contactar', $Contactar);
    $contacto->verResultados('contactar');
   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
 <form action="contactar.php" method="post">
        <!-- <input type="text" name="dniLogin" placeholder="introduce tu DNI"
        pattern="[0-9]{8}[a-zA-Z]{1}">
        <button type="submit">Enviar</button> -->

        
  

    <!-- HEADER -->

    <header>
   
    </header>

<!-- SECTION -->
    <section>
    <article>
    <div>

    <h1>
   CONTACTANOS...
   </h1>

    <!-- Nombre -->

    <label for="nombre">
    nombre
    </label>

    <input type="text" name="nombre">

    <!-- Apellidos -->

    <label for="mail">
    mail
    </label>

    <input type="mail" name="mail">

    <!-- Comentario -->

    <h2>
    COMENTARIO
    </h2>

    <textarea name="comentario" rows="10">
    </textarea>

<button type="submit">
AGREGAR RECORDATORIO
</button>
    </div>
    </article>
    </section>

    <!-- FOOTER -->

    <footer>
    
    
    </footer>

    </form>
</body>
</html>