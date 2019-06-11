<?php
require_once 'vendor/autoload.php';
use models\{Conexion};

// require_once 'php/conexion';

if(isset($_POST['inbox'])) {

    $Atributosinbox =  
    "active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

    $inboxBD = $_POST['inbox'];

    // array del inbox para que no nos de problemas con el metodo InsertarTupla(), en donde usamos arrays, porque queremos usar muchos atributos si se da el caso.

    $inbox = [

        'gtd' => $inboxBD
    ];
// CREAMOS LA BASE DE DATOS MEDIANTE ESTE OBJETO Y PORQUE EN EL CONSTRUCTOR IGUALAMOS LA PROPIEDAD CON EL MYSQLI
    $gtd = new Conexion('localhost', 'root', '', 'recordatorios');
    // ANTES: $gtd->InsertarTupla('gtd', 'recordatorio', "\" $inboxBD \"");
    $gtd->InsertarTupla('gtd', $inbox);
    $gtd->verResultados('gtd');
    // $gtd->CrearTabla('historialbase', $Atributosinbox);

    
    echo('<a href="php/contactar.php">');
    echo('CONTACTAR');
    echo('</a>');


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
 <form action="index.php" method="post">
        <!-- <input type="text" name="dniLogin" placeholder="introduce tu DNI"
        pattern="[0-9]{8}[a-zA-Z]{1}">
        <button type="submit">Enviar</button> -->

        
  

    <!-- HEADER -->

    <header>
   <h1>
   GTD. GESTIONA TUS TAREAS
   </h1>
    </header>

<!-- SECTION -->
    <section>
    <article>
    <div>
    <h2>
    INBOX
    </h2>

    <textarea name="inbox" rows="10">
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